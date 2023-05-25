<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() 
    {
        return true;  //abilitiamo il poter affettuare una modifica
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required|unique:projects|string|max:150',
            'content'=> 'nullable|string',
            'image'=> 'nullable|image|max:2048'  //2MB
        ];
    }
}
