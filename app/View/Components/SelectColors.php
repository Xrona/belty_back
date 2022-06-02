<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectColors extends Component
{
    public String $name;

    public Array $list;

    public mixed $currentValues;

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
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.select-colors');
    }
}
