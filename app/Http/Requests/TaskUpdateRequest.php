<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Url;

class TaskUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'                 => 'bail|required|min:5|max:200',
            'slug'                  => 'bail|max:200',
            'body'                  => 'bail|string|between:3,500',
            'priority'              => 'bail|required|integer',
            'responsible_person_id' => 'bail|required|integer|exists:users,id',
            'status_id'             => 'bail|required|integer|exists:statuses,id',
        ];
    }

    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();

        $parameters = [
            $this->route()->parameter('task')->id
        ];

        return $url->route('tasks.edit', $parameters);
    }
}
