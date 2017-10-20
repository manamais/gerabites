<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Artigos extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'artigos';
    protected $primaryKey = 'ART_CODIGO';
    protected $fillable = ['ART_TITULO', 'ART_TEXTO'];
    public $rules = [
        'ART_TITULO' => 'max:255',
        'ART_TEXTO' => 'required',
    ];

//    public function post() {
//        return $this->belongsToMany(\App\Models\Restrito\Posts::class, 'post_artigos', 'POST_CODIGO', 'POST_CODIGO');
//    }
    
    public function post()
    {
        //    $this->belongsToMany('relacao', 'nome da tabela pivot', 'key ref. books em pivot', 'key ref. author em pivot')
        //return $this->belongsToMany(\App\Models\Restrito\Posts::class, 'post_artigos', 'POST_CODIGO', 'ART_CODIGO')->withPivot(['status']);
        return $this->belongsToMany(\App\Models\Restrito\Posts::class, 'post_artigos', 'POST_CODIGO', 'ART_CODIGO');
    }

}
