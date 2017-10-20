<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Restrito\Permission;
use App\Models\Restrito\Role;

class User extends Authenticatable {

    use Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'EMPR_CODIGO',
        'tipo',
        'cargo',
        'name',
        'matricula',
        'genero',
        'dtnascimento',
        'cpf',
        'rg',
        'foto',
        'status',
        'phone',
        'cellphone',
        'cellphone2',
        'email',
        'password',
        'descricao',
        'exibirnosite',
    ];
    public $rules = [
        'EMPR_CODIGO' => 'required|numeric',
        'tipo' => 'required|max:20',
        'cargo' => 'required|max:20',
        'name' => 'required|max:120',
        'matricula' => 'max:20',
        'genero' => 'required',
        'dtnascimento' => 'date|required',
        'cpf' => 'max:16|unique:users,cpf,((ID{?})),id',
        'rg' => 'max:30',
        'foto' => 'max:255',
        'status' => 'max:20',
        'phone' => 'max:16',
        'cellphone' => 'max:16',
        'cellphone2' => 'max:16',
        'password' => 'required',
        'email' => 'required|max:250|unique:users,email,((ID{?})),id',
        'descricao' => 'required',
        'exibirnosite' => 'required|max:3',
    ];

    /**
     * Atributos da tabela "users" que devem ser escondidos.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(\App\Models\Restrito\Role::class);
    }

    public function hasPermission(Permission $permission) {
        /* recupero os perfis e permissões */
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles) {
        /* recupero os perfis e permissões */
        if (is_array($roles) || is_object($roles)) {
            return $roles->intersect($this->roles)->count();
        }

        return $this->roles->contains('name', $roles);
    }

}
