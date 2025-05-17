<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }

    public function messages()
{
    return [
        'title.required' => 'Task title is required.',
        'title.max' => 'The title cannot exceed 255 characters.',
        'status.required' => 'Select the task status.',
        'status.in' => 'The status must be "pending" or "completed".',
    ];
}
}
