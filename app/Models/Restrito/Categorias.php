<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Categorias extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'categorias';
    protected $primaryKey = 'CAT_CODIGO';
    protected $fillable = ['CAT_TIPO', 'CAT_TITULO', 'CAT_SLUG', 'CAT_ICONE', 'CAT_DESCRICAO', 'CAT_CORTOPO', 'CAT_CORFONTETOPO', 'CAT_LINKTOPO', 'CAT_LINKFOOTER'];
    public $rules = [
        'CAT_TIPO' => 'required|max:1',
        'CAT_TITULO' => 'required|min:4|max:50|unique:categorias,CAT_TITULO,((ID{?})),CAT_CODIGO',
        'CAT_SLUG' => 'required|max:60',
        'CAT_ICONE' => 'max:250',
        'CAT_DESCRICAO' => 'max:250',
        'CAT_CORTOPO' => 'max:30',
        'CAT_CORFONTETOPO' => 'max:30',
        'CAT_LINKTOPO' => 'required|max:1',
        'CAT_LINKFOOTER' => 'required|max:1',
    ];

    public function subcategorias() {
        return $this->hasMany(\App\Models\Restrito\SubCategorias::class, 'CAT_CODIGO');
    }

}
