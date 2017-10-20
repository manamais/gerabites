<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Eventos extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'eventos';
    protected $primaryKey = 'EVEN_CODIGO';
    protected $fillable = ['EVEN_TITULO','EVEN_TEXTO','EVEN_DATA','EVEN_LOCAL','EVEN_TIPO']; //ESPECIFICO EM QUAIS CAMPOS PODEM SER GRAVADOS
    public $rules = [
        'EVEN_TITULO' => 'required|max:80',
        'EVEN_TEXTO' => 'required',
        'EVEN_TIPO' => 'required|max:30',
        'EVEN_DATA' => 'required|date',
        'EVEN_LOCAL' => 'required|max:120',
    ];

}
