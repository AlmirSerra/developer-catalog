<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class DeveloperValidator
{
    public function validateCreate(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:developers,email'],
            'age' => ['required', 'numeric', 'between:18,60'],
            'programming_languages' => ['required', 'array', 'min:1'],
            'programming_languages.*' => ['string', 'distinct', 'in:php,python,javascript,java,swift'],
        ]);

        return $validator;
    }

    public function validateUpdate(array $data, $id)
    {
        $validator = Validator::make($data, [
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'unique:developers,email,' . $id],
            'age' => ['sometimes', 'numeric', 'between:18,60'],
            'programming_languages' => ['sometimes', 'array', 'min:1'],
            'programming_languages.*' => ['string', 'distinct', 'in:php,python,javascript,java,swift'],
        ]);

        return $validator;
    }
}

