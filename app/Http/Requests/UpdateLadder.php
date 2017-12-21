<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Ladder;

class UpdateLadder extends FormRequest
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
            "team.*" => "required|integer|distinct|between:1,10"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'integer'  => 'The :attribute must be a number.',
            'between'  => 'The :attribute must be between :min - :max.'
        ];
    }

    /**
     * Get the attributes for the defined validation fields.
     *
     * @return array
     */
    public function attributes()
    {
        $attributes = [];

        $teams = Ladder::orderBy('name', 'asc')->get();

        foreach ($teams as $team)
        {
            $attributes["team.".$team->id] = $team->name . " position";
        }

        return $attributes;
    }
}
