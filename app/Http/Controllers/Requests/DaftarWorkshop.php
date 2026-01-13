<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class DaftarWorkshop extends FormRequest
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
            'id_workshop' => 'required|size:8',
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:10|max:500',
            'date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'poster' => 'required|file|mimes:jpg,png,jpeg|max:2048',
    ];
    }
}
