<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select2 extends Component
{
    public String $name;
    public Array $list;
    public int|null $currentValue;
    public String $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $list, $currentValue, $label)
    {
        $this->name = $name;
        $this->list = $list;
        $this->currentValue = $currentValue;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.select2');
    }
}
