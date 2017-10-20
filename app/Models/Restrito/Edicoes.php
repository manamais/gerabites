<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Edicoes extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'versao_impressa';
    protected $primaryKey = 'VI_CODIGO';
    protected $fillable = ['VI_NUMERO', 'VI_DATA', 'VI_PDF'];
    public $rules = [
        'VI_NUMERO' => 'required|numeric|unique:versao_impressa,VI_NUMERO,((ID{?})),VI_CODIGO',
        'VI_DATA' => 'required|date',
        'VI_PDF' => 'required|max:50',
    ];

}
