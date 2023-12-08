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
            'check_box' => 'required|accepted',
            'shedule_date' => 'exclude_unless:check_box,true|required|date',
            'post_title' => 'exclude_unless:check_box,true|required|string',
            'post_body' => 'exclude_unless:check_box,true|required|string',


        ];
    }
    public function messages()
    {
        return [
            'check_box.required' => 'first checkbox the check box ',
            'post_body.required' => 'First enter the Post body',
            'post_title.required' => 'First enter the Post title',
            'post_title.required' => 'First enter the Post date',



        ];
    }
}
