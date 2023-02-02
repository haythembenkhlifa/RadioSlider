<?php

namespace Haythembenkhlifa\RadioSlider;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\Field;

class RadioSlider extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'radio-slider';

    /**
     * Set Values.
     * 
     * @param array $values
     * @return $this 
     */
    public function setValues(array $values)
    {
        return $this->withMeta([
            'values' => $values,
            'uuid' => Str::uuid()
        ]);
    }

    /**
     * Set initial value.
     * 
     * @param mixed $initial_value
     * @return $this 
     */
    public function initialValue($initial_value)
    {
        return $this->withMeta([
            'initialValue' => $initial_value,
        ]);
    }
}
