<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Tickets extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'tickets';
    protected $primaryKey = 'TICK_CODIGO';
    protected $fillable = [
        'user_id',
        'user_id_funcionario',
        'TICK_ASSUNTO',
        'TICK_DEPARTAMENTO',
        'TICK_PRIORIDADE',
        'TICK_STATUS',
    ];
    public $rules = [
        'user_id' => 'required|numeric',
        'user_id_funcionario' => 'numeric',
        'TICK_ASSUNTO' => 'required|max:60',
        'TICK_DEPARTAMENTO' => 'required|max:40',
        'TICK_PRIORIDADE' => 'required|max:15',
        'TICK_STATUS' => 'required|max:15',
    ];

}
