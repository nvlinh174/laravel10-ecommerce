<?php

namespace App\View\Components\Admin\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $required;
    public $title;
    public $customClass;

    /**
     * Create a new component instance.
     */
    public function __construct($name = '', $required = false, $title = '', $customClass = '')
    {
        $this->name = $name;
        $this->required = $required;
        $this->title = $title;
        $this->customClass = $customClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.forms.input');
    }
}
