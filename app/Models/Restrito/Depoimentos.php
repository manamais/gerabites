<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Depoimentos extends Model implements AuditableContract {
    use Auditable;
    use SoftDeletes;

    protected $table = 'depoimentos';
    protected $primaryKey = 'DEP_CODIGO';
    protected $fillable = ['user_id', 'DEP_TEXTO', 'DEP_STATUS'];
    public $rules = [
    'user_id' => 'required|numeric',
    'DEP_TEXTO' => 'required',
    'DEP_STATUS' => 'required|max:20',
    ];

}
