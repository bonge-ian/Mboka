<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Collection;
use Lean\LivewireAccess\WithImplicitAccess;
use Lean\LivewireAccess\BlockFrontendAccess;

class RegisterForm extends Component
{
    use WithImplicitAccess;

    #[BlockFrontendAccess]
    public Collection $state;

    public int $step;

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public ?string $password_confirmation = '';

    public function mount() : void
    {
        if (!empty($this->state->get('customer'))) {
             $this->fill([
                 'name' => data_get($this->state, 'customer.name'),
                 'email' => data_get($this->state, 'customer.email'),
                 'password' => data_get($this->state, 'customer.password'),
                 'password_confirmation' => data_get($this->state, 'customer.password')
             ]);
        }
    }

    public function submit() : void
    {
        $validated = $this->validate();

        $this->state->put('customer', $validated);

        $this->emitUp('mergeState', $this->state);

        $this->emitUp('advanceToStep', ++$this->step);
    }

    protected function rules() : array
    {
        return User::rules();
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
