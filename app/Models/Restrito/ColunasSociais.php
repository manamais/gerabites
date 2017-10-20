<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ColunasSociais extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'colunas_sociais';
    protected $primaryKey = 'CS_CODIGO';
    protected $fillable = ['ES_CODIGO', 'CS_TITULO','CS_NOTINHA','CS_IMAGEM','CS_SLUG'];
    public $rules = [
        'ES_CODIGO' => 'required|numeric',
        'CS_TITULO' => 'required|max:100',
        'CS_NOTINHA' => 'required',
        'CS_IMAGEM' => 'max:120',
        'CS_SLUG' => 'required|max:120',
    ];

}
