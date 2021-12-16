<?php

namespace App\View\Components;

use Illuminate\View\Component;

class select2 extends Component
{
    public String $name;
    public Array $list;
    public int $currentValue;
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select2');
    }
}
