<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ConfigBoletos extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'config_boletos';
    protected $primaryKey = 'CB_CODIGO';
    protected $fillable = [
        'CB_BANCO',
        'CB_AGENCIA',
        'CB_AGENCIA_DV',
        'CB_CONTA',
        'CB_CONTA_DV',
        'CB_MULTA',
        'CB_JUROS',
        'CB_JUROSAPOS',
        'CB_DIASPROTESTO',
        'CB_CARTEIRA',
        'CB_VARIACAOCARTEIRA',
        'CB_CONVENIO',
        'CB_RANGE',
        'CB_CODIGOCLIENTE',
        'CB_MENSAGEM1',
        'CB_MENSAGEM2',
        'CB_MENSAGEM3',
        'CB_INSTRUCAO1',
        'CB_INSTRUCAO2',
        'CB_INSTRUCAO3',
        'CB_ACEITE',
        'CB_ESPECIEDOC',
    ];
    public $rules = [
        'CB_BANCO' => 'required|max:50',
        'CB_AGENCIA' => 'required|numeric',
        'CB_AGENCIA_DV' => 'required|numeric',
        'CB_CONTA' => 'required|numeric',
        'CB_CONTA_DV' => 'required|numeric',
        'CB_MULTA' => '',
        'CB_VALORTR' => '',
        'CB_VALORCARACTERE' => '',
        'CB_JUROS' => '',
        'CB_JUROSAPOS' => '',
        'CB_DIASPROTESTO' => '',
        'CB_CARTEIRA' => 'numeric',
        'CB_VARIACAOCARTEIRA' => 'max:20',
        'CB_CONVENIO' => 'required|max:20',
        'CB_RANGE' => 'max:20',
        'CB_CODIGOCLIENTE' => 'numeric',
        'CB_MENSAGEM1' => 'required|max:200',
        'CB_MENSAGEM2' => 'max:200',
        'CB_MENSAGEM3' => 'max:200',
        'CB_INSTRUCAO1' => 'required|max:200',
        'CB_INSTRUCAO2' => 'max:200',
        'CB_INSTRUCAO3' => 'max:200',
        'CB_ACEITE' => 'max:20',
        'CB_ESPECIEDOC' => 'max:20',
    ];

}
