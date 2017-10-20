<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Endereco extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'enderecos';
    protected $primaryKey = 'END_CODIGO';
    protected $fillable = [
        'END_CEP',
        'END_LOGRADOURO',
        'END_TIPOLOGRADOURO',
        'END_BAIRRO',
        'END_CIDADE',
        'END_UF',
        'END_COMPLEMENTO',
        'END_NUMERO',
        'END_DESCRICAOERRO',
    ];
    public $rules = [
        'END_CEP' => 'required|min:8|max:10',
        'END_LOGRADOURO' => 'required|max:100',
        'END_TIPOLOGRADOURO' => 'max:20',
        'END_BAIRRO' => 'max:50',
        'END_CIDADE' => 'required|max:100',
        'END_UF' => 'required|max:2',
        'END_COMPLEMENTO' => 'max:20',
        'END_NUMERO' => 'max:7',
        'END_DESCRICAOERRO' => 'max:200',
    ];

}
