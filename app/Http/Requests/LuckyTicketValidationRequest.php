<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LuckyTicketValidationRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    protected $redirect = '/';

    public function messages()
    {
        parent::messages();
        return [
            "answer.required" => "Необходимо значение кнопки.",
            "answer.boolean" => "Значение должно быть булевым."
        ];
    }

    public function rules()
    {
        return [
            "luckyTicket" => "required|numeric|max:999999|min:100000",
            "answer" => "required|boolean"
        ];
    }

}
