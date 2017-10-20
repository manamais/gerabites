<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Posts extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'posts';
    protected $primaryKey = 'POST_CODIGO';
    protected $fillable = ['SUBCAT_CODIGO', 'POS_CODIGO', 'user_id', 'POST_TITULO', 'POST_SUBTITULO', 'POST_RETRANCA', 'POST_SLUG', 'POST_URL', 'POST_STATUS', 'POST_TEXTO', 'POST_TAGS', 'POST_TAGS_URL','POST_DTINICIO', 'POST_RESSTRITAAOSUSUARIOS', 'POST_IMAGE','POST_IMAGE_LEGENDA','POST_IMAGE_CREDITO'];
    public $rules = [
        'SUBCAT_CODIGO' => 'numeric',
        'user_id' => 'required|numeric',
        'POST_RETRANCA' => 'max:60',
        'POST_TITULO' => 'required|max:180',
        'POST_SUBTITULO' => 'max:256',
        'POST_SLUG' => 'required|max:256',
        'POST_STATUS' => 'required|max:15',
        'POST_TEXTO' => 'required',
        'POST_TAGS' => 'required|max:255',
        'POST_TAGS_URL' => 'required|max:255',
        'POST_DTINICIO' => 'date',
        'POST_RESSTRITAAOSUSUARIOS' => 'required|max:3',
        'POST_IMAGE' => 'max:256',
        'POST_IMAGE_LEGENDA' => 'max:256',
        'POST_IMAGE_CREDITO' => 'max:256',
    ];

//    public function artigos() {
//        return $this->belongsToMany(\App\Models\Restrito\Posts::class, 'post_artigos', 'POST_CODIGO', 'ART_CODIGO');
//    }
}
