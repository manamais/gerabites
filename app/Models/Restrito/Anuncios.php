<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Anuncios extends Model implements AuditableContract {

    use Auditable;

    use SoftDeletes;

    protected $table = 'anuncios';
    protected $primaryKey = 'ANU_CODIGO';
    protected $fillable = ['CAT_CODIGO', 'POS_CODIGO', 'ANU_CLIENTE', 'ANU_NOME', 'ANU_URL', 'ANU_IMAGEM', 'ANU_ORDEM', 'ANU_DTINICIO', 'ANU_DTTERMINO', 'ANU_EMBED', 'ANU_IMAGEMEXTERNA'];
    public $rules = [
        'CAT_CODIGO' => 'required|numeric',
        'POS_CODIGO' => 'required|numeric',
        'ANU_CLIENTE' => 'numeric',
        'ANU_NOME' => 'required|max:90',
        'ANU_URL' => 'max:255',
        'ANU_IMAGEM' => 'max:120',
        'ANU_ORDEM' => 'numeric',
        'ANU_DTINICIO' => 'required|date',
        'ANU_DTTERMINO' => 'required|date',
        'ANU_EMBED' => '',
        'ANU_IMAGEMEXTERNA' => 'max:255',
    ];

}
