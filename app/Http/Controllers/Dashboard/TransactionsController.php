<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Concerns\TotalExpenditure;

class TransactionsController extends Controller
{
    use TotalExpenditure;

    public function __invoke(Request $request)
    {
        $user = $request->user();
        $total_expenditure = $this->getTotalExpenditure($user->id);

        return view(
            view: 'dashboard.transactions',
            data: compact('user', 'total_expenditure')
        );
    }
}
