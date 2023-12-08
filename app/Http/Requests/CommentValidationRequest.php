<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentValidationRequest extends FormRequest
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
            'comment_body' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'comment_body.required' => 'enter your new comment',
            'comment_body.string' => 'comment should be a string'
        ];
    }
}
