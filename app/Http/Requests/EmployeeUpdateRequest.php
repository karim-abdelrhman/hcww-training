<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
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
            'company_id' => 'required|integer|exists:LUCOMPANIES,id',
            'country_code' => 'required|string|exists:COUNTRIES,COUNTRY_CODE',
            'organization_id' => 'required|integer|exists:LUORGUNITS,id',
            'position_id' => 'required|integer|exists:LUPOSITIONS,id',
            'employee_type_id' => 'required|integer|exists:EMPLOYEE_TYPES,id',
            'career_path_id' => 'required|integer|exists:LUCAREERPATHS,id',
            'degree_id' => 'required|integer|exists:LUDEGREES,id',
            'job_id' => 'required|integer|exists:LUJOBS,id',
            'grade_id' => 'required|integer|exists:LUGRADES,id',
            'faculty_id' => 'required|integer|exists:LUFACULTIES,id',
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('employees')->ignore($this->route('employee'))],
            'phone1' => ['required', 'string', 'max:255'],
            'phone2' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255' , Rule::unique('employees')->ignore($this->route('employee'))],
            'active' => ['required', 'boolean'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'insurance_number' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }
}
