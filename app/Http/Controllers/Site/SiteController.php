<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\StandardControllerPublic;
use App\Models\Restrito\Categorias;
use App\Models\Restrito\SubCategorias;
use App\User;
use App\Models\Restrito\Anuncios;
use App\Models\Restrito\Posts;

//use Illuminate\Http\Request;

class SiteController extends StandardControllerPublic {

    protected $categorias;
    protected $subcategorias;
    protected $users;
    protected $posts;
    protected $anuncios;
    protected $gate;

    public function __construct(Categorias $categorias, User $users, Posts $posts, SubCategorias $subcategorias, Anuncios $anuncios) {

        $this->categorias = $categorias;
        $this->subcategorias = $subcategorias;

        $this->users = $users;
        $this->posts = $posts;
        $this->anuncios = $anuncios;
        $this->gate = 'SECRETARIA';
    }

    public function index() {
        return view('site._home.index');
    }


}
