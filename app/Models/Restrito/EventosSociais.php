<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class EventosSociais extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'eventos_sociais';
    protected $primaryKey = 'ES_CODIGO';
    protected $fillable = ['ES_TITULO'];
    public $rules = [
        'ES_TITULO' => 'max:120',
    ];

}
