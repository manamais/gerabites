<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Debitos extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'debitos';
    protected $primaryKey = 'DEB_CODIGO';
    protected $fillable = ['TD_CODIGO', 'DEB_DTLANCAMENTO', 'DEB_DTVENCIMENTO', 'DEB_DTPAGAMENTO', 'DEB_VALOR', 'COMPLEMENTO']; //ESPECIFICO EM QUAIS CAMPOS PODEM SER GRAVADOS
    public $rules = [
        'TD_CODIGO' => 'required|numeric',
        'DEB_DTLANCAMENTO' => 'required|date',
        'DEB_DTVENCIMENTO' => 'required|date',
        'DEB_DTPAGAMENTO' => 'date',
        'DEB_VALOR' => 'required',
        'COMPLEMENTO' => 'max:200',
    ];

}
