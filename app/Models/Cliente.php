<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Cliente extends Model
{

    protected array $fillable = [
        'nome', 'cnpj', 'data_cadastro', 'endereco', 'telefone'
    ];

    protected array $dates = [
        'data_cadastro'
    ];

    public bool $timestamps = false;

    public function validation_rules($id = null)
    {
        $restrict = $id ? ",cnpj,$id" : '';

        return [
            'nome' => 'required|min:3|max:50',
            'cnpj' => "required|digits:14|unique:clientes{$restrict}",
            'data_cadastro' => 'required|date',
            'endereco' => 'required|min:3|max:200',
            'telefone' => 'required|min:3|max:15'
        ];
    }
}
