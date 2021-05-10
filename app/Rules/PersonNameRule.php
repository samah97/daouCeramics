<?php


namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;

class PersonNameRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // TODO: check why always returning false
        return true;
/*        if(preg_match('/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/', $value)){
            return true;
        }else {
            return false;
        }*/
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
    }
}
