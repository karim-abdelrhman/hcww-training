<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingCentersStoreRequest extends FormRequest
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
            'name'=> ['required', 'string'],
            'image'=> ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'address'=> ['required', 'string'],
            'phone'=> ['required', 'string'],
            'code'=> ['required', 'string' , 'unique:training_centers'],
            'fax'=> ['required', 'string'],
            'email'=> ['required', 'string', 'email'],
            'location'=> ['required', 'string'],
            'center_manager_name'=> ['required', 'string'],
            'center_manager_phone'=> ['required', 'string'],
            'general_manager_name'=> ['required', 'string'],
            'general_manager_phone'=> ['required', 'string'],
            'hr_name'=> ['required', 'string'],
            'hr_phone'=> ['required', 'string'],
            'company_id'=> ['required', 'integer' , 'exists:lucompanies,id'],
        ];
    }
}
