<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Arquivos extends Model implements AuditableContract {
    use Auditable;
    use SoftDeletes;

    protected $table = 'arquivos';
    protected $primaryKey = 'ARQ_CODIGO';
    protected $fillable = ['PROJ_CODIGO', 'ARQ_NOME', 'ARQ_DESCRICAO', 'ARQ_URL'];
    public $rules = [
    'PROJ_CODIGO' => 'required|numeric',
    'ARQ_NOME' => 'required|max:60',
    'ARQ_DESCRICAO' => 'required|max:120',
    'ARQ_URL' => 'required|max:80',
    ];

}
