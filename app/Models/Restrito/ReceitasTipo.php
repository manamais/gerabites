<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ReceitasTipo extends Model   implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'tipos_receitas';
    protected $primaryKey = 'TR_CODIGO';
    protected $fillable = ['TR_DESCRICAO']; 
    public $rules = [
        'TR_DESCRICAO' => 'required|min:5|max:120',
    ];
    
    public function viewReceita(){
        //return $this->hasOne('App\Models\Restrito\Receitas','TR_CODIGO');
        return $this->hasMany('App\Models\Restrito\Receitas','TR_CODIGO')->where('REC_DTRECEBIMENTO', '<>', NULL);
    }
    
}
