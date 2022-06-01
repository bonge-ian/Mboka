<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Company;
use App\Models\Listing;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Domain\States\ListingStatusEnum;
use App\Http\Middleware\VerifyRedirectUrl;
use Illuminate\Http\Client\RequestException;
use App\Services\Flutterwave\TransactionService;
use App\Domain\ValueObjects\Flutterwave\TransactionPayload;
use App\Domain\ValueObjects\Flutterwave\TransactionResponse;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(VerifyRedirectUrl::class);
    }

    public function __invoke(Request $request)
    {
        if ($request->query('status') === 'cancelled') {
            $request->session()->forget('create-listing');

            return redirect('/')
                ->with('error', "Failed transaction. You cancelled the payment.");
        }

        if (!$transaction = $this->verify($request->query('transaction_id'))) {
            return redirect('/')
                ->with('error', "An error occured while verifying the transaction.");
        }

        try {
            DB::beginTransaction();

            if ($request->session()->has('create-listing.customer')) {
                $raw = $request->session()->get('create-listing.customer');
                $raw['password'] = Hash::make($raw['password']);

                $user = User::create($raw);
            } else {
                $user = Auth::user();
            }

            $this->createListingAndItsRelations($request, $user, $transaction);

            DB::commit();

            if (!Auth::check()) {
                Auth::login($user);
            }

            return redirect()->route('dashboard')->with('status', 'create-listing');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();


            return redirect('/')->with('error', 'An error occured while creating your listing. Kindly contact support');
        }
    }

    protected function verify(int $id): bool|TransactionResponse
    {
        $service = app(TransactionService::class);

        try {
            $response = $service->verify($id);

            if (!$response->status === "successful") {
                return false;
            }

            return $response;
        } catch (RequestException $ex) {
            Log::error('Transaction verification failure', $ex->getMessage());

            return false;
        }
    }

    protected function createListingAndItsRelations(
        Request $request,
        User $user,
        TransactionResponse $transaction
    ): void {

        $company = Company::create($request->session()->get('create-listing.company'));

        $rawListingData = array_merge(
            $request->session()->get('create-listing.listing'),
            $request->session()->get('create-listing.enhancements'),
            [
                'user_id' => $user->id,
                'company_id' => $company->id,
                'status' => ListingStatusEnum::ACTIVE
            ]
        );

        $listing = Listing::create($rawListingData);

        $tags = collect($request->session()->get('create-listing.tags'))->map(
            fn ($tag) => Tag::firstOrCreate([
                'name' => ucfirst($tag)
            ])
        );

        $listing->tags()->attach($tags->pluck('id'));

        $listing->payments()->create([
            'code' => $transaction->transactionCode,
            'flw_id' => $transaction->id,
            'user_id' => $user->id,
            'amount' => $transaction->amount,
            'status' => $transaction->status,
            'paid_at' => $transaction->created_at,
            // 'listing_id' => $listing->id,
            'payment_method' => $transaction->paymentType,
        ]);

        $request->session()->forget('create-listing');
    }
}
