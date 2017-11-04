<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Tarefas extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'tarefas';
    protected $primaryKey = 'TAR_CODIGO';
    protected $fillable = [
        'PROD_CODIGO',
        'user_id',
        'PROJ_CODIGO',
        'ETA_CODIGO',
        'TAR_DESCRICAO',
        'TAR_DTINICIO',
        'TAR_DTPRAZOESTIMADO',
        'TAR_DTFINAL',
        'TAR_ARQUIVO',
        'TAR_PROGRESSO',
        'TAR_VISIVELAOCLIENTE',
        'TAR_STATUS',
        'TAR_APVCLIENTE_VALOR',
        'TAR_APVCLIENTE_TAREFA',
    ];
    public $rules = [
        'PROD_CODIGO' => 'required|numeric',
        'user_id' => 'numeric',
        'PROJ_CODIGO' => 'required|numeric',
        'ETA_CODIGO' => 'numeric',
        'TAR_DESCRICAO' => 'required',
        'TAR_DTINICIO' => 'required|date',
        'TAR_DTPRAZOESTIMADO' => 'required|date',
        'TAR_DTFINAL' => 'date',
        'TAR_ARQUIVO' => 'max:255',
        'TAR_PROGRESSO' => 'max:10',
        'TAR_VISIVELAOCLIENTE' => 'required|max:3',
        'TAR_STATUS' => 'required|max:15',
        'TAR_APVCLIENTE_VALOR' => 'required|max:3',
        'TAR_APVCLIENTE_TAREFA' => 'required|max:3',
    ];

}
