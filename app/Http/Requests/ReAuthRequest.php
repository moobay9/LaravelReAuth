<?php

namespace Funaffect\LaravelReAuth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Funaffect\LaravelReAuth\Rules\ReAuthCurrentPassword;

class ReAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->session()->reflash();
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
            'password' => ['required', new ReAuthCurrentPassword],
        ];
    }
}
