<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class menuUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'code' => 'required|alpha_dash|lowercase|max:64|unique:menus,code,'.$this->menu->id,
            'description' => 'max:255'
        ];
    }
}
