<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Colunistas extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'colunistas';
    protected $primaryKey = 'COL_CODIGO';
    protected $fillable = ['user_id',
        'SUBCAT_CODIGO',
        'COL_DESCRICAO',
        'COL_FACEBOOK',
        'COL_TWITTER',
        'COL_GOOGLE',
        'COL_LINKEDIN',
    ];
    public $rules = [
        'user_id' => 'required|numeric',
        'SUBCAT_CODIGO' => 'required|numeric',
        'COL_DESCRICAO' => 'required|max:255',
        'COL_FACEBOOK' => 'max:255',
        'COL_TWITTER' => 'max:255',
        'COL_GOOGLE' => 'max:255',
        'COL_LINKEDIN' => 'max:255',
    ];

}
