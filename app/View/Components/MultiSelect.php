<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MultiSelect extends Component
{
    public String $name;

    public Array $list;

    public $currentValues;

    public String $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $list, $currentValues, $label)
    {
        $this->name = $name;

        $this->list = $list;

        if ($currentValues != null) {
            $this->currentValues = $currentValues->map(
                function ($model) {
                    return $model->id;
                }
            )->toArray();

        } else {
            $this->currentValues  = null;
        }

        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.multi-select');
    }
}
