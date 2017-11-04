<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {

        $this->call('Empresas');
        $this->call('Usuarios');
        $this->call('ConfiguracoesBoleto');
        $this->call('Sistema');
        $this->call('Reacoes');

        $this->call('Roles');
        $this->call('Permissions');
        $this->call('PermissionsRoles');
        $this->call('RolesUsers');

        $this->call('Categorias');
        $this->call('SubCategorias');
        $this->call('Posts');
    }

}
