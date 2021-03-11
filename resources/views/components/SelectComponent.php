<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectComponent extends Component
{

    /**
     *
     * @var string
     */
    public $value;

    /**
     *
     * @var string
     */
    public $slug;

    /**
     *
     * @var string
     */
    public $array;

    /**
     * Create the component instance.
     *
     * @param  string  $value
     * @param  string  $slug
     * @param  string  $array
     * @return void
     */
    public function __construct($value,$slug,$array)
    {
        $this->value = $value = [
            "'assets/img/customMat/AppImg/fondo1.png'",
            "'assets/img/customMat/AppImg/fondo1.png'" ,
        ];
        $this->slug = $slug = [
            "fondo1",
            "fondo2" ,
        ];
        $this->array = $array = [
            "value" => $value,
            "slug"  => $slug,
        ];

    }

    /**
     * Determine if the given option is the currently selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isSelected($option)
    {
        return $option === $this->array;
    }


    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function render()
    {
        return view('components.select');
    }
}
