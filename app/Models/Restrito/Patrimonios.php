<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Patrimonios extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'patrimonios';
    protected $primaryKey = 'PAT_CODIGO';
    protected $fillable = ['PAT_TIPO','PAT_MARCA','PAT_VALOR','PAT_DATAAQUISICAO','PAT_ANOSUTEIS','PAT_ESTADO','PAT_LOCALIZACAO']; //ESPECIFICO EM QUAIS CAMPOS PODEM SER GRAVADOS
    public $rules = [
        'PAT_TIPO' => 'required|min:4|max:70',
        'PAT_MARCA' => 'max:70',
        'PAT_VALOR' => 'required',
        'PAT_DATAAQUISICAO' => 'required|date',
        'PAT_ANOSUTEIS' => 'numeric|required',
        'PAT_ESTADO' => 'required|min:4|max:30',
        'PAT_LOCALIZACAO' => 'max:120',
    ];            
            
}
