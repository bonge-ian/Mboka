<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Concerns\FormatLocationProperty;

class CompanyDetailsForm extends Component
{
    use WithFileUploads;

    use FormatLocationProperty;

    public int $step = 2;

    public Collection $state;

    public string $bio = '';

    public $logo;

    public string $name = '';

    public string $website = '';

    public string $headquarters = '';

    public bool $isAlreadyUploaded = false;

    public function mount(): void
    {
        if (!empty($this->state->get('company'))) {
            $this->fill([
                'bio' => data_get($this->state, 'company.bio'),
                'logo' =>   data_get($this->state, 'company.logo'),
                'name' => data_get($this->state, 'company.name'),
                'website' => data_get($this->state, 'company.website'),
                'headquarters' => data_get($this->state, 'company.headquarters'),
            ]);


            if (
                !is_null($this->logo) &&
                Storage::disk('public')->fileExists("companies/assets/{$this->logo}")
            ) {
                $this->isAlreadyUploaded = true;
            }
        }
    }

    public function clearUploaded(): void
    {
        $this->isAlreadyUploaded = false;

        if (Storage::disk('public')->fileExists('companies/assets/' . $this->logo)) {
            Storage::disk('public')->delete("companies/assets/" . $this->logo);
        }

        $this->reset('logo');
    }

    public function submit(): void
    {
        $this->headquarters = $this->formatLocationProperty($this->headquarters);

        if (!$this->isAlreadyUploaded) {
            $validated = $this->validate();

            $validated['logo'] = basename($this->logo->store('companies/assets', 'public'));
        } else {
            $validated = $this->validate(Arr::except($this->rules(), 'logo'));
            $validated['logo'] = $this->logo;
        }

        $this->state->put('company', $validated);

        $this->emit('mergeState', $this->state);

        $this->emit('advanceToStep', ++$this->step);
    }

    protected function rules(): array
    {
        return Company::rules();
    }

    public function render(): View
    {
        return view('livewire.company-details-form');
    }
}
