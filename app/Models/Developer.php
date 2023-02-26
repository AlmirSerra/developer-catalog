<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Developer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'age',
        'hobby',
        'birthdate',
        'level_id'
    ];

    protected $dates = ['deleted_at'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function getBirthdateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($developer) {
            if ($developer->projects()->exists()) {
                throw new \Exception('Não é possível excluir um desenvolvedor que possui projetos cadastrados.');
            }
        });
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'developer_project');
    }

    public static function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:developers,email',
            'age' => 'required|integer|min:16|max:120',
            'hobby' => 'nullable|min:3|max:255',
            'birthdate' => 'required|date_format:d/m/Y',
            'level_id' => 'required|exists:levels,id'
        ];
    }

    public static function messages()
    {
        return [
            'name.required' => 'O nome do desenvolvedor é obrigatório.',
            'name.min' => 'O nome do desenvolvedor deve ter pelo menos 3 caracteres.',
            'name.max' => 'O nome do desenvolvedor não pode ter mais de 255 caracteres.',
            'email.required' => 'O email do desenvolvedor é obrigatório.',
            'email.email' => 'O email informado não é válido.',
            'email.unique' => 'Já existe um desenvolvedor cadastrado com este email.',
            'age.required' => 'A idade do desenvolvedor é obrigatória.',
            'age.integer' => 'A idade do desenvolvedor deve ser um número inteiro.',
            'age.min' => 'A idade mínima do desenvolvedor é 16 anos.',
            'age.max' => 'A idade máxima do desenvolvedor é 120 anos.',
            'hobby.min' => 'O hobby do desenvolvedor deve ter pelo menos 3 caracteres.',
            'hobby.max' => 'O hobby do desenvolvedor não pode ter mais de 255 caracteres.',
            'birthdate.required' => 'A data de nascimento do desenvolvedor é obrigatória.',
            'birthdate.date_format' => 'A data de nascimento do desenvolvedor deve estar no formato dd/mm/yyyy.',
            'level_id.required' => 'O nível do desenvolvedor é obrigatório.',
            'level_id.exists' => 'O nível selecionado não é válido.'
        ];
    }
}

