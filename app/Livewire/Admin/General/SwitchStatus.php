<?php

namespace App\Livewire\Admin\General;

use Livewire\Component;

class SwitchStatus extends Component
{
    public $value;
    public $model;
    public $id;

    public function mount($value, $model, $id)
    {
        $this->value = $value;
        $this->model = "\\App\\Models\\$model";
        $this->id = $id;
    }

    public function updated($property)
    {
        $this->value = $this->value ? 1 : 0;
        $this->model::where('id', $this->id)->update(['status' => $this->value]);
    }

    public function render()
    {
        return view('livewire.admin.general.switch-status');
    }
}
