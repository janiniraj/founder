<?php

namespace App\Http\Requests\Backend\Speech;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRequest.
 */
class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin() ? true : $this->user()->hasPermissionTo('Speech Management');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191',
            'content' => 'required',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'name must required',
            'name.max' => 'name may not be greater than 191 characters.',
            'slug.required' => 'slug must required',
            'slug.max' => 'slug may not be greater than 191 characters.',
            'content.required' => 'content must required',
        ];
    }
}
