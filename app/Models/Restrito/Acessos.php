<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Acessos extends Model implements AuditableContract {

    use Auditable;

    use SoftDeletes;

    protected $table = 'acessos';
    protected $primaryKey = 'ACES_CODIGO';
    protected $fillable = ['CAT_CODIGO', 'POST_CODIGO','ACES_QTD'];
    public $rules = [
        'POST_CODIGO' => 'numeric',
        'ANU_CODIGO' => 'numeric',
        'ACES_QTD' => 'numeric',
    ];
   

}
