<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Receitas extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'receitas';
    protected $primaryKey = 'REC_CODIGO';
    protected $fillable = ['user_id', 'TR_CODIGO', 'REC_DTLANCAMENTO', 'REC_DTREFERENCIA','REC_DTVENCIMENTO', 'REC_DTRECEBIMENTO', 
        'REC_VALOR', 'COMPLEMENTO', 'REC_VALORRECEBIDO', 'REC_NOSSONUMERO','REC_NUMERODOCUMENTO','REC_STATUS',]; //ESPECIFICO EM QUAIS CAMPOS PODEM SER GRAVADOS
    public $rules = [
        'user_id' => 'numeric',
        'TR_CODIGO' => 'required|numeric',
        'REC_DTLANCAMENTO' => 'required|date',
        'REC_DTREFERENCIA' => 'date',
        'REC_DTVENCIMENTO' => 'date',
        'REC_DTRECEBIMENTO' => 'date',
        'REC_VALOR' => 'required',
        'REC_VALORRECEBIDO' => '',
        'REC_NOSSONUMERO' => 'max:25|unique:receitas,REC_NOSSONUMERO,((ID{?})),REC_NOSSONUMERO',
        'REC_NUMERODOCUMENTO' => 'max:20|unique:receitas,REC_NUMERODOCUMENTO,((ID{?})),REC_NUMERODOCUMENTO',
        
        'COMPLEMENTO' => 'max:200',
        'REC_STATUS' => 'max:50',
    ];
    
    public function viewTipoReceita(){
        return $this->belongsTo('App\Models\Restrito\ReceitasTipo', 'TR_CODIGO');
        //return $this->belongsToMany(\App\Models\Restrito\Permission::class);
    }
}
