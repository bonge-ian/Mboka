<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Domain\Helpers\Money;

use App\Domain\Helpers\Prices;
use Illuminate\Support\Collection;
use Lean\LivewireAccess\WithImplicitAccess;
use Lean\LivewireAccess\BlockFrontendAccess;

class PaymentForm extends Component
{
    use WithImplicitAccess;

    #[BlockFrontendAccess]
    public Collection $state;

    #[BlockFrontendAccess]
    public int $step;


    public function getTotalPriceProperty()
    {
        $total = Prices::default()->amount();

        $total += collect($this->state->get('enhancements'))
            ->filter(
                fn ($enhancement) => $enhancement === true
            )
            ->keys()
            ->map(
                fn ($enhancement) => $this->getPrices($enhancement)->amount()
            )->sum();

        return new Money($total);
    }

    public function submit() : void
    {
        $this->state->put('total', $this->totalPrice->amount());

        $this->emit('mergeState', $this->state);

        $this->emitUp('checkout');
    }

    public function render()
    {
        return view('livewire.payment-form');
    }

    protected function getPrices(string $enhancement)
    {
        return match ($enhancement) {
            'is_pinned' => Prices::pinned(),
            'is_highlighted' => Prices::highlight(),
            'show_logo' => Prices::showLogo(),
            default => null
        };
    }
}
