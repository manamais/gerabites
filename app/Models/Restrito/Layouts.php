<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Layouts extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'layouts';
    protected $primaryKey = 'LAY_CODIGO';
    protected $fillable = ['LAY_NOME',
        'LAY_DESCRICAO',
        'LAY_CORFONTEPADRAO',
        'LAY_CORTOPO',
        'LAY_CORFONTETOPO',
        'LAY_CORRODAPE',
        'LAY_CORFONTERODAPE',
        'LAY_STATUS', 'LAY_IMAGEM',];
    public $rules = [
        'LAY_NOME' => 'required|max:20',
        'LAY_DESCRICAO' => 'required|max:250',
        'LAY_CORFONTEPADRAO' => 'max:30',
        'LAY_CORTOPO' => 'max:30',
        'LAY_CORFONTETOPO' => 'max:30',
        'LAY_CORRODAPE' => 'max:30',
        'LAY_CORFONTERODAPE' => 'max:30',
        'LAY_STATUS' => 'required|max:15',
        'LAY_IMAGEM' => '',
    ];

}
