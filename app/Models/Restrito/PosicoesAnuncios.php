<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class PosicoesAnuncios extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'posicoes_anuncios';
    protected $primaryKey = 'POS_CODIGO';
    protected $fillable = [
        'POS_DESCRICAO', 'POS_IMAGEM', 'POS_TAMANHO',
    ];
    public $rules = [
        'POS_TAMANHO' => 'required|max:30',
        'POS_DESCRICAO' => 'required|max:60',
        'POS_IMAGEM' => 'max:30',
    ];

}
