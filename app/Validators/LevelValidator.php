<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class LevelValidator
{
    public function validateCreate(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:levels,name'],
            'description' => ['required', 'string', 'max:255'],
            'is_active' => ['required', 'boolean'],
        ]);

        return $validator;
    }

    public function validateUpdate(array $data, $id)
    {
        $validator = Validator::make($data, [
            'name' => ['sometimes', 'string', 'max:255', 'unique:levels,name,' . $id],
            'description' => ['sometimes', 'string', 'max:255'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        return $validator;
    }
}

