<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class activationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pin_code' => 'required|numeric',
        ];
    }
}
