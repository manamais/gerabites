<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class EnderecoUsuario extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'enderecos_usuarios';
    protected $primaryKey = 'ENDUSER_CODIGO';
    protected $fillable = [ 'user_id', 'END_CODIGO', ];
    public $rules = [
        'END_CODIGO' => 'required|numeric',
        'user_id' => 'required|numeric',
    ];

}
