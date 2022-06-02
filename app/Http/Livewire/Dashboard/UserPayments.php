<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Payment;
use Livewire\Component;

class UserPayments extends Component
{
    public int $user_id;

    public function paginationSimpleView()
    {
        return 'vendor.livewire.simple-uikit';
    }

    public function render()
    {
        $user_payments = $this->getUserPayments();

        return view('livewire.dashboard.user-payments', compact('user_payments'));
    }

    protected function getUserPayments()
    {
        return Payment::query()
            ->where(
                column: 'user_id',
                operator: '=',
                value: $this->user_id
            )
            ->with('listing:id,slug,title')
            ->orderBy('paid_at', 'desc')
            ->simplePaginate();
    }
}
