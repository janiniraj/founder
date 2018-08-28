<?php

namespace App\Http\Requests\Backend\Publication;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateRequest.
 */
class CreateRequest extends FormRequest
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
            //
        ];
    }
}
