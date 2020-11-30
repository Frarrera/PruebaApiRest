<?php

namespace App\Http\Requests;

use App\Rules\QuantityRule;
use App\Traits\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BuyRequest extends FormRequest
{
    use ApiResponse;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'quantity' => [
                'required',
                new QuantityRule($this->route('id'))
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->showError(
            'No se puede procesar la petición',
            $validator->errors()->all(),
            400
        ));
    }
}
