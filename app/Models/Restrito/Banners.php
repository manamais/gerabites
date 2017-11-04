<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Banners extends Model implements AuditableContract {

    use Auditable;

    use SoftDeletes;

    protected $table = 'banners';
    protected $primaryKey = 'BAN_CODIGO';
    protected $fillable = ['BAN_POSICAO','BAN_NOME', 'BAN_URL', 'BAN_IMAGEM', 
        'BAN_ORDEM', 'BAN_EMBED', 'BAN_IMAGEMEXTERNA'];
    public $rules = [
        'BAN_POSICAO' => 'required|max:20',
        'BAN_NOME' => 'required|max:90',
        'BAN_URL' => 'max:255',
        'BAN_IMAGEM' => 'max:120',
        'BAN_ORDEM' => 'numeric',
        'BAN_EMBED' => '',
        'BAN_IMAGEMEXTERNA' => 'max:255',
    ];

}
