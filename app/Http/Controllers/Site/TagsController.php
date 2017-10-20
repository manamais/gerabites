<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Restrito\Posts;
use App\Models\Restrito\Reacoes;
use App\Models\Restrito\ReacoesPostagens;

class TagsController extends Controller {

    protected $users;
    protected $posts;
    protected $reacoes;
    protected $reacoesPostagens;
    protected $gate;

    public function __construct(User $users, Posts $posts, Reacoes $reacoes, ReacoesPostagens $reacoesPostagens) {

        $this->users = $users;
        $this->posts = $posts;
        $this->reacoes = $reacoes;
        $this->reacoesPostagens = $reacoesPostagens;
        $this->gate = 'SECRETARIA';
    }

    public function tags($tags) {

//        dd("A tag clicada foi a: $tags");
        $postsTags = $this->posts
                ->where('POST_TAGS_URL', 'like', "%$tags%")
                ->get();
        dd($postsTags);



//        $postsCodigos = $array = array_pluck($postsTags, 'POST_CODIGO');
//        dd($postsCodigos);


//            $data = $this->users
//                            ->leftJoin('enderecos_usuarios', 'enderecos_usuarios.user_id', 'users.id')
//                            ->where('id', '>', 1)->whereIn('IGR_CODIGO', $codigosIgrejas)->get();
//            return view("{$this->nomeView}.ministros-missionarias", compact('data'));


    }

}
