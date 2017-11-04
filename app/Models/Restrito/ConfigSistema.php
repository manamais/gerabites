<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ConfigSistema extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'configuracoes';
    protected $primaryKey = 'CONFIG_CODIGO';
    protected $fillable = [
        'CONFIG_NOMESITE', 'CONFIG_LOGOTOPO','CONFIG_LOGORODAPE', 'CONFIG_FAVICON', 'CONFIG_METATITLE',
        'CONFIG_METADESCRIPTION', 'CONFIG_METAKEYWORDS','CONFIG_URLTERMODEUSO', 'CONFIG_CODGOOGLE', 'CONFIG_API', 'CONFIG_SENHA',
        ];
    public $rules = [
        'CONFIG_NOMESITE' => 'required|max:120',
        'CONFIG_LOGOTOPO' => 'required|max:30',
        'CONFIG_LOGORODAPE' => 'required|max:30',
        'CONFIG_FAVICON' => 'required|max:30',
        'CONFIG_METATITLE' => 'required|max:120',
        'CONFIG_METADESCRIPTION' => 'required|max:255',
        'CONFIG_METAKEYWORDS' => 'required|max:255',
        'CONFIG_URLTERMODEUSO' => 'required|max:255',
        'CONFIG_CODGOOGLE' => '',
        'CONFIG_API' => 'max:255',
        'CONFIG_SENHA' => 'max:255',
    ];
}