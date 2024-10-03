<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug',
            'description' => 'required',
            'content' => 'required',
            'image_url' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
            'published' => 'boolean'
        ];
    }
}
