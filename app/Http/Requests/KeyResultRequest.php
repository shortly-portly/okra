<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeyResultRequest extends FormRequest
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
        // Ensure the Key Result date lies between the start and end date of the objective
        $afterObjectiveStart = 'after:' . $this->objective->start_date;
        $beforeObjectiveEnd  = 'before:' . $this->objective->end_date;

        return [

            'description' => ['required', 'min:2', 'max:255'],
            'start_date'  => ['required', 'date', $afterObjectiveStart],
            'end_date'    => ['required', 'date', 'after:start_date', $beforeObjectiveEnd],
        ];
    }

    public function messages()
    {
        return [
            'start_date.after' =>
            'The start date must be after the objective start date (' . $this->objective->start_date->format('d/m/Y') . ')',

            'end_date.before'  =>
            'The end date must be before the objective end date (' . $this->objective->end_date->format('d/m/Y') . ')',
        ];
    }
}
