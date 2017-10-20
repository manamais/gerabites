<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Solicitacao extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'solicitacoes';
    protected $primaryKey = 'SOL_CODIGO';
    protected $fillable = ['user_id', 'SOL_PEDIDO', 'SOL_STATUS', 'SOL_RESPOSTA','SOL_CHECK'];
    public $rules = [
        'user_id' => 'numeric|required',
        'SOL_PEDIDO' => 'required',
        'SOL_STATUS' => 'required|max:25',
        'SOL_CHECK' => 'max:1',
        'SOL_RESPOSTA' => '',
    ];
            

}
