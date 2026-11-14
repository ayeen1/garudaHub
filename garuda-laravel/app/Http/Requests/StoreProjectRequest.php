<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{

    public function authorize(): bool
    {
        return $this->user()?->role === 'client';
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:200'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'description' => ['required', 'string', 'max:5000'],
            'budget_min'  => ['required', 'integer', 'min:0'],
            'budget_max'  => ['required', 'integer', 'gte:budget_min'],
            'deadline'    => ['required', 'date', 'after:today'],
        ];
    }

     public function attributes(): array
    {
        return [
            'title'       => 'judul proyek',
            'category_id' => 'kategori',
            'description' => 'deskripsi',
            'budget_min'  => 'budget minimal',
            'budget_max'  => 'budget maksimal',
            'deadline'    => 'batas lelang',
        ];
    }

    public function messages(): array
    {
        return [
            'required'       => ':Attribute wajib diisi.',
            'max'            => ':Attribute maksimal :max karakter.',
            'integer'        => ':Attribute harus berupa angka.',
            'min'            => ':Attribute minimal :min.',
            'date'           => ':Attribute harus berupa tanggal.',
            'exists'         => ':Attribute yang dipilih tidak valid.',
            'budget_max.gte' => 'Budget maksimal harus lebih besar atau sama dengan budget minimal.',
            'deadline.after' => 'Batas lelang harus setelah hari ini.',
        ];
    }
}
