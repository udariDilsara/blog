<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidationRequest extends FormRequest
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
            'check_box' => 'sometimes|boolean|max:255',
            'shedule_date' => 'required_if:check_box,true|nullable|date',
            'post_title' => 'required|string',
            'post_body' => 'required|string',


        ];
    }
    public function messages()
    {
        return [
            'check_box.required' => 'First check the check box ',
            'post_body.required' => 'Enter the Post body',
            'post_title.required' => 'Enter the Post title',
            'shedule_date.required' => 'Enter the Post date',



        ];
    }
}
