<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ConfigMidiasSociais extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'config_midias_sociais';
    protected $primaryKey = 'MS_CODIGO';
    protected $fillable = ['MS_NOME', 'MS_URL', 'MS_APP_ID', 'MS_APP_PASSW',];
    public $rules = [
        'MS_NOME' => 'required|max:30',
        'MS_URL' => 'required|max:255',
        'MS_APP_ID' => 'required|max:255',
        'MS_APP_PASSW' => 'required|max:255',
    ];
}