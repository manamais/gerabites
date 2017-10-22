<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Impostos extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'impostos';
    protected $primaryKey = 'IMP_CODIGO';
    protected $fillable = ['IMP_NOME','IMP_DESCRICAO', 'IMP_TAXA']; 
    public $rules = [
        'IMP_NOME' => 'required|max:15',
        'IMP_DESCRICAO' => 'required|max:80',
        'IMP_TAXA' => 'required',
    ];
}
