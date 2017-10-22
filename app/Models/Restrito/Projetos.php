<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Projetos extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'projetos';
    protected $primaryKey = 'PROJ_CODIGO';
    protected $fillable = ['EMPR_CODIGO','PROJ_NOME', 'PROJ_DESCRICAO', 'PROJ_TIPO','PROJ_STATUS'];
    public $rules = [
        'EMPR_CODIGO' => 'required|numeric',
        'PROJ_NOME' => 'required|min:5|max:120|unique:projetos,PROJ_NOME,((ID{?})),PROJ_CODIGO',
        'PROJ_DESCRICAO' => 'required|max:255',
        'PROJ_TIPO' => 'required|max:20',
        'PROJ_STATUS' => 'required|max:20',
    ];

}
