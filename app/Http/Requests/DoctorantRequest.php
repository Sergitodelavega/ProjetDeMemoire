<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorantRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'matricule' => 'required|string',
            'specialite' => 'required|string',
            'laboratoire_id' => 'required|exists:laboratoires,id',
            'photo' => 'required|image',
            'year_id' => 'required|exists:years,id',
            'encadreur_id' => 'required|exists:encadreurs,id'
        ];
    }
}
