<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PercentageRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $type;
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->type === 'percentage' && ($value < 0 || $value > 100)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The value must be between 0 and 100 when the type is percentage.';
    }
}
