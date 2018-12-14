<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LimiteFecha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($customValue)
    {
        //
        $this->customValue = $customValue;
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
        $fin = date_create($value);
        $inicio = date_create($this->customValue);
        date_add($inicio,date_interval_create_from_date_string("1 years"));
        if($inicio > $fin){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El rango entre fechas no puede ser superior a 1 año';
    }
}
