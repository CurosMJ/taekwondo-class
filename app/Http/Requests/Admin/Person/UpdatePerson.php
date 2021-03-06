<?php namespace App\Http\Requests\Admin\Person;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePerson extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.person.edit', $this->person);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'person_fname' => ['sometimes', 'string'],
            'person_lname' => ['sometimes', 'string'],
            'mobile_no' => ['sometimes', 'integer', 'digits:10'],
            'email' => ['sometimes', 'email', 'string'],
            'person_gender' => ['sometimes', 'string', 'in:male,female'],
            'address' => ['sometimes', 'string'],
            'postal_code' => ['sometimes', 'string'],
        ];
    }
}
