<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Posicoes extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'posicoes';
    protected $primaryKey = 'POS_CODIGO';
    protected $fillable = [
        'POS_DESCRICAO', 'POS_IMAGEM',
    ];
    public $rules = [
        'POS_DESCRICAO' => 'required|max:60',
        'POS_IMAGEM' => 'max:30',
    ];

}
