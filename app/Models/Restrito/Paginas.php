<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Paginas extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'paginas';
    protected $primaryKey = 'PAG_CODIGO';
    protected $fillable = ['PAG_TITULO', 'PAG_SLUG', 'PAG_DESCRICAO', 'PAG_LINKTOPO', 'PAG_LINKRODAPE'];
    public $rules = [
        'PAG_TITULO' => 'required|min:4|max:130|unique:paginas,PAG_TITULO,((ID{?})),PAG_CODIGO',
        'PAG_SLUG' => 'required|max:130',
        'PAG_DESCRICAO' => 'required',
        'PAG_LINKTOPO' => 'required|max:1',
        'PAG_LINKRODAPE' => 'required|max:1',
    ];

}
