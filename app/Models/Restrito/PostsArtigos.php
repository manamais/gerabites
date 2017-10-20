<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class PostsArtigos extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'post_artigos';
    protected $primaryKey = 'PA_CODIGO';
    protected $fillable = ['POST_CODIGO', 'ART_CODIGO'];
    public $rules = [
        'POST_CODIGO' => 'required|numeric',
        'ART_CODIGO' => 'required|numeric',
    ];

}
