<?php

namespace Src\event\category\infrastructure\validators;

use Illuminate\Foundation\Http\FormRequest;

class ExampleValidatorRequest extends FormRequest
{
public function authorize()
{
return true;
}

public function rules()
{
return [
'field' => 'nullable|max:255'
];
}

}