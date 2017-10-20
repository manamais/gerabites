<?php

namespace App\Http\Controllers\Restrito;

use App\Http\Controllers\StandardController;
use App\Models\Restrito\Permission;
use App\Models\Restrito\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosRolesPermissionsController extends StandardController {

    protected $model;
    protected $permission;
    protected $request;
    protected $page;
    protected $gate;
    protected $nomeView = 'restrito.usuarios-permissions-roles';
    protected $redirectIndex = '/restrito/permissoes-perfil';

    public function __construct(Role $model, Permission $permission, Request $request) {
        $this->model = $model;
        $this->permission = $permission;
        $this->request = $request;
        $this->page = "permissoes-perfil";
        $this->titulo = "PERMISSÕES ATRIBUÍDAS AO PERFIL";
        $this->gate = 'SUPERADMIN';
    }

    public function index() {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $table_pivot = DB::table('permission_role')
                ->leftJoin('roles', 'roles.id', 'permission_role.role_id')
                ->leftJoin('permissions', 'permissions.id', 'permission_role.permission_id')
                ->select('permission_role.id as idpr', 'permission_role.role_id as prRoleId', 'permission_role.permission_id as prPermId', 'permissions.name as namePerm', 'roles.id as rolesId', 'roles.name as rolesName', 'roles.label as rolesLabel')
                ->get();

        $data = $this->model->all();
        return view("{$this->nomeView}.index", compact('data', 'table_pivot'))
                        ->with('page', $this->page)
                        ->with('titulo', $this->titulo);
    }

    public function adicionarPermissao($id) {
        $gate = $this->gate;
        if (Gate::denies("$gate")) {
            abort(403, 'Não Autorizado!');
        }
        $permissions = $this->permission->where('id', '>', 1)->get();
        return view("{$this->nomeView}.cadastrar-editar", compact('permissions'))
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
        $permission_id = $dadosForm['permission_id'];
        $insert = DB::insert('insert into permission_role (role_id,permission_id) values (?, ?)', [$id, $permission_id]);

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

        $deleta = DB::delete("delete from permission_role where id = $id");
        if ($deleta) {
            return '1';
        } else {
            return 'Falha ao Deletar arquivo!';
        }
    }

}
