<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Expediente extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;
    
    protected $table = 'expedientes';
    protected $primaryKey = 'EXP_CODIGO';
    protected $fillable = ['EXP_NOME', 'EXP_CARGO', 'EXP_FONE'];
    public $rules = [
        'EXP_NOME' => 'required|max:30',
        'EXP_CARGO' => 'required|max:30',
        'EXP_FONE' => 'required|max:14',
    ];

}