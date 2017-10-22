<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Produtos extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'produtos';
    protected $primaryKey = 'PROD_CODIGO';
    protected $fillable = ['PROD_NOME', 'PROD_DESCRICAO', 'PROD_VALOR', 'PROD_TIPO']; 
    public $rules = [
        'PROD_NOME' => 'required|max:80',
        'PROD_DESCRICAO' => 'required|max:255',
        'PROD_VALOR' => 'required',
        'PROD_TIPO' => 'required|max:100',
    ];

    }
