<?php

namespace App\Http\Requests\Backend\News;

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
        return $this->user()->isAdmin() ? true : $this->user()->hasPermissionTo('News Management');
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
