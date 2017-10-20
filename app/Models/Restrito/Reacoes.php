<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Reacoes extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'reacoes';
    protected $primaryKey = 'REA_CODIGO';
    protected $fillable = ['REA_SLUG', 'REA_EMOCTION', 'REA_STATUS'];
    public $rules = [
        'REA_SLUG' => 'required|min:4|max:20|unique:reacoes,REA_SLUG,((ID{?})),REA_CODIGO',
        'REA_EMOCTION' => 'max:20',
        'REA_STATUS' => 'required|max:20',
    ];

}
