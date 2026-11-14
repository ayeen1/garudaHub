<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBidRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->role === 'developer';
    }

    public function rules(): array
    {
        return [
            'price'         => ['required', 'integer', 'min:1'],
            'duration_days' => ['required', 'integer', 'min:1', 'max:365'],
            'proposal'      => ['required', 'string', 'max:3000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'price'         => 'harga',
            'duration_days' => 'durasi',
            'proposal'      => 'proposal',
        ];
    }
}
