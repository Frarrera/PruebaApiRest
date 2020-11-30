<?php

namespace App\Rules;

use App\Http\Controllers\Product\ProductController;
use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;

class QuantityRule implements Rule
{
    private $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id = $id;
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
        //
        return Product::Where([
            ['quantity','>=',$value],
            ['id','=',$this->id]])->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El producto no tiene suficientes existencias para procesar la operacion.';
    }
}
