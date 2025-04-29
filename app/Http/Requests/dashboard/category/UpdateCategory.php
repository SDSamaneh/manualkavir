<?php

namespace App\Http\Requests\dashboard\category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class UpdateCategory extends FormRequest
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
            'author_id' => 'required|exists:users,id',
            'name' => 'required|string|max:50|unique:categories,name',
            'slug' => 'required|string|unique:categories,slug',
            'thumbnail' => 'nullable|max:2048|mimes:jpeg,jpg,png,gif',
            'description' => 'nullable|string'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'برای دسته بندی نام مناسب انتخاب کنید',
            'name.max' => 'نام حداکثر میتواند 50 حرف باشد',
            'name.unique' => 'نام قبلا ثبت شده است نام دیگری انتخاب کنید ',
        
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'author_id' => auth()->id()
        ]);


        if (!empty($this->slug)) {

            $this->merge(['slug' => Str::slug($this->slug)]);
        }
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            if ($this->input('name') !== strtoupper($this->input('name'))) {
                $validator->errors()->add('name', 'عنوان باید با کاراکتر های بزرگ باشد');
            }
        });
    }
}
