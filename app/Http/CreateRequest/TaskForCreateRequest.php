<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskForCreateRequest extends FormRequest
{
    
    public function Authorize()
    {
        return true;
    }

    public function Rules()
    {
        return [
            'name' => 'required|regex:/.*\s\w+/',
               ];
    }
}
