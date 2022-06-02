<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select2ForOrder extends Component
{
    public String $name;

    public Array $list;

    public mixed $currentValue;

    public String $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $list, $currentValue)
    {
        $this->name = $name;

        $this->currentValue = $currentValue;

        $this->label = $label;

        if (!in_array($currentValue, array_column($list, 'name'))) {
            array_unshift($list, ['name' => $currentValue]);
        }

        $this->list = $list;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.select2-for-order');
    }
}
