<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Url;

class TasksPositionRequest extends FormRequest
{
    /**
     * The URI to redirect to if validation fails.
     *
     * @var string
     */
    public $redirect = 'tasks.index';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->redirect = URL::route('tasks');

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

}
