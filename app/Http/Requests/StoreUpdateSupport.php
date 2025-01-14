<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'subject' => 'required|min:3|max:255|unique:supports',
            'body' => ['required', 'min:3', 'max:100000'],
        ];
    
        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {

            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                //"unique:supports,subject,{$this->id},id"
                Rule::unique('supports')->ignore($this->id ?? $this->support), // Aqui eu uso o Rule para ignorar o id atual // como boa prática deixar a vírgula no final.
            ];
        }
    
        return $rules;
    }
}
