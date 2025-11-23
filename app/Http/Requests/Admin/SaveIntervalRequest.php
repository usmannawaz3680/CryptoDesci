<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SaveIntervalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'apr_3d' => 'nullable|numeric|min:0',
            'apr_7d' => 'nullable|numeric|min:0',
            'apr_30d' => 'nullable|numeric|min:0',
            'ends_at' => 'nullable|date|after_or_equal:today',
            'next_rate' => 'nullable|numeric|min:0',
        ];
    }
}