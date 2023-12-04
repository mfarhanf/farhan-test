<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClaimSubmissionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'date' => 'required|date',
            'benefit' => 'required|integer',
            'description' => 'required',
            'amount' => 'required|integer',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'date' => date('Y-m-d', strtotime($this->date)),
        ]);
    }
}
