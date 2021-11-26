<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class StoreArticleRequest extends FormRequest
{
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
            'titre' => 'required|min:5',
            'order' => 'required|numeric',
            'is_active' => 'required|boolean',
        ];
    }

    /**
 * Return validation errors as json response
 *
 * @param Validator $validator
 */
protected function failedValidation(Validator $validator)
{
    $response = [
        'status' => 'failure',
        'status_code' => 400,
        'message' => 'Vérifiez l erreur suivante',
        'errors' => $validator->errors(),
    ];

    throw new HttpResponseException(response()->json($response, 400));
}
}
