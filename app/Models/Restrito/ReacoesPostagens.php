<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ReacoesPostagens extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'reacoes_postagens';
    protected $primaryKey = 'RP_CODIGO';
    protected $fillable = ['REA_CODIGO', 'POST_CODIGO', 'CS_CODIGO','RP_IP'];
    public $rules = [
        'REA_CODIGO' => 'required|numeric',
        'POST_CODIGO' => 'numeric',
        'CS_CODIGO' => 'numeric',
        'RP_IP' => 'max:20',
    ];

}
