<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Empresa extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'empresas';
    protected $primaryKey = 'EMPR_CODIGO';
    protected $fillable = [
        'EMPR_NOMEFANTASIA', 'EMPR_RAZAOSOCIAL', 'EMPR_INSCRICAOMUNICIPAL', 'EMPR_INSCRICAOESTADUAL', 'EMPR_CNPJ', 'EMPR_ENDERECO', 'EMPR_CIDADE', 'EMPR_UF', 'EMPR_CEP', 'EMPR_FONE','EMPR_LOGO',
    ];
    public $rules = [
        'EMPR_NOMEFANTASIA' => 'required|max:200',
        'EMPR_RAZAOSOCIAL' => 'required|max:200',
        'EMPR_INSCRICAOMUNICIPAL' => 'max:20',
        'EMPR_INSCRICAOESTADUAL' => 'max:20',
        'EMPR_CNPJ' => 'required|max:20',
        'EMPR_ENDERECO' => 'required|max:200',
        'EMPR_CIDADE' => 'required|max:120',
        'EMPR_UF' => 'required|max:2',
        'EMPR_CEP' => 'required|max:10',
        'EMPR_FONE' => 'required|max:14',
        'EMPR_LOGO' => 'max:50',
    ];

}