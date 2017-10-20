<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class SubCategorias extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'subcategorias';
    protected $primaryKey = 'SUBCAT_CODIGO';
    protected $fillable = ['CAT_CODIGO','SUBCAT_TITULO', 'SUBCAT_SLUG', 'SUBCAT_DESCRICAO']; 
    public $rules = [
        'CAT_CODIGO' => 'required|numeric',
        'SUBCAT_TITULO' => 'required|min:4|max:50',
        'SUBCAT_SLUG' => 'required|max:60',
        'SUBCAT_DESCRICAO' => 'max:250',
    ];
    
    
    public function categorias() {
        return $this->belongsTo(\App\Models\Restrito\Categorias::class, 'CAT_CODIGO');
    }

}
