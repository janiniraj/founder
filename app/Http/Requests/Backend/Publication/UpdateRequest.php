<?php

namespace App\Http\Requests\Backend\Publication;

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
        return $this->user()->isAdmin() ? true : $this->user()->hasPermissionTo('Publication Management');
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
            'year' => 'required|max:191',
            'content' => 'required',
            'url' => 'required',
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
            'name.max' => ' name may not be greater than 191 characters.',
            'year.required' => 'year must required',
            'year.max' => ' year may not be greater than 191 characters.',
            'content.required' => 'content must required',
            'url.required' => 'URL must required',
        ];
    }
}
