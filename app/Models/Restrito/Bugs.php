<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Bugs extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'bugs';
    protected $primaryKey = 'BUGS_CODIGO';
    protected $fillable = ['user_id','PROJ_CODIGO', 'BUGS_NOME', 'BUGS_GRAVIDADE', 'BUGS_DESCRICAO', 'BUGS_STATUS'];
    public $rules = [
        'PROJ_CODIGO' => 'required|numeric',
        'user_id' => 'numeric',
        'BUGS_NOME' => 'required|max:60',
        'BUGS_GRAVIDADE' => 'required|max:20',
        'BUGS_STATUS' => 'required|max:20',
        'BUGS_DESCRICAO' => 'required',
    ];

}
