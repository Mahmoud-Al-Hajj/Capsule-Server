<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapsuleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        return [
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'mood' => 'string',
            'reveal_at' => 'required',
            'is_public' => 'required|boolean'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Title is required',
            'message.required' => 'Message is required',
            'reveal_at.required' => 'Reveal at is required',
            'is_public.required' => 'It should be either public or private'
        ];
    }

}
