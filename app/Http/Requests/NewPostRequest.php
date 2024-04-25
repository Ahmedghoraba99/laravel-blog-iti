<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPostRequest extends FormRequest
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
            'title' => 'required|min:3|max:50|unique:posts,title,',
            'body' => 'required|min:10|max:1500',
            'user_id' => 'required|exists:users,id',
            'image' => 'required|image|mimes:jpeg,png,jpg',

        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.min' => 'The title must be at least :min characters.',
            'title.max' => 'The title may not be greater than :max characters.',
            'body.required' => 'The body field is required.',
            'body.min' => 'The body must be at least :min characters.',
            'body.max' => 'The body may not be greater than :max characters.',
            'user_id.required' => 'The user_id field is required.',
            "image.required" => "The image field is required.",
            "image.image" => "The image must be an image.",
            "image.mimes" => "The image must be a jpeg, png, or jpg file.",
            "image.uploaded" => "The image failed to upload.",
        ];
    }
}
