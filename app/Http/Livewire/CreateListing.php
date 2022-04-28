<?php

namespace App\Http\Livewire;

use Session;
use Redirect;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\Flutterwave\CheckoutService;
use App\Domain\ValueObjects\Factories\CustomerFactory;
use App\Domain\ValueObjects\Factories\CheckoutPayloadFactory;

class CreateListing extends Component
{
    public Collection $state;

    public int $step = 1;

    protected $listeners = [
        'advanceToStep',
        'mergeState',
        'checkout',
    ];

    public function mount(): void
    {
        $this->state = collect();
    }

    public function advanceToStep(int $step): void
    {
        $this->step = $step;
    }

    public function mergeState(array|Collection $payload): void
    {
        $this->state = $this->state->merge($payload);
    }

    public function checkout()
    {
        $user = $this->getUserOrCustomer();

        // prepare for validation
        $payload = CheckoutPayloadFactory::make([
            'amount' => $this->state->get('total'),
            'redirectUrl' => route('payment.verification'),
            'customer' => CustomerFactory::make([
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'] ?? null
            ]),
            'meta' => [
                'listing' => $this->state->get('listing')['title'],
            ],
        ]);


        Session::put('create-listing', $this->state);
        // Session::flash('create-listing', $this->state);
        // Session::reflash();

        $service = app(CheckoutService::class);
        $redirect = $service($payload);

        $this->dispatchBrowserEvent('redirect-request');

        return Redirect::to($redirect);
    }

    public function render(): View
    {
        return view('livewire.create-listing')
            ->layout('layouts.app', ['title' => 'Create a new job listing']);
    }

    protected function getUserOrCustomer(): User|array
    {
        return Auth::check() ? Auth::user()->toArray() : $this->state->get('customer');
    }
}
