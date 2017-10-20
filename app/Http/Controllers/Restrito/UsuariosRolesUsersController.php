<?php

namespace App\Http\Controllers\Restrito;

use App\Http\Controllers\StandardController;
use App\Models\Restrito\Permission;
use App\Models\Restrito\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsuariosRolesUsersController extends StandardController {

    protected $model;
    protected $role;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.usuarios-roles-users';
    protected $redirectIndex = '/restrito/perfil-usuarios';

    public function __construct(User $model, Role $role, Request $request) {
        $this->model = $model;
        $this->role = $role;
        $this->request = $request;
        $this->page = "perfil-usuarios";
        $this->titulo = "PERMISSÕES ATRIBUÍDAS AO PERFIL";
        $this->gate = 'GERENCIAMENTO-USUARIOS';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $table_pivot = DB::table('role_user')
                ->leftJoin('roles', 'roles.id', 'role_user.role_id')
                ->leftJoin('users', 'users.id', 'role_user.user_id')
                ->select(
                        'role_user.id', 'roles.id as roleId', 'users.id as userId', 'roles.name as roleName', 'users.name as userName')
                ->get();
        $data = $this->model->where('id', '>', 1)->get();

        return view("{$this->nomeView}.index", compact('data', 'table_pivot'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function adicionarPermissao($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $roles = $this->role->where('id', '>', 1)->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('roles'))
                        ->with('id', $id)
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function adicionarPermissaoDB($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

        $dadosForm = $this->request->all();
        $role_id = $dadosForm['role_id'];
        $insert = DB::insert('insert into role_user (user_id,role_id) values (?, ?)', [$id, $role_id]);

        if ($insert) {
            alert()->success('', 'Registro inserido!');
            return redirect("$this->redirectIndex")
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        } else {
            alert()->error('Houve um erro no registro. Corrija e tente novamente!', 'Falha na inserção!')->autoclose(4500);
            return redirect()->back()
                            ->with('page', $this->page)
                            ->with('titulo', $this->titulo);
        }
    }

    public function deletar($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }

//        $role_user = DB::table('role_user')
//                ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
//                ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
//                ->select(
//                        'role_user.id as idpr', 'role_user.role_id as prRoleId', 'role_user.role_id as prPermId', 'roles.name as namePerm', 'roles.id as rolesId', 'roles.name as rolesName', 'roles.label as rolesLabel')
//                ->where('role_user.id', $id)
//                ->get();
//        dd($role_user);

        $deleta = DB::delete("delete from role_user where id = $id");
        if ($deleta) {
            return '1';
        } else {
            return 'Falha ao Deletar arquivo!';
        }
    }

}
