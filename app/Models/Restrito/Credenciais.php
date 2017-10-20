<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Credenciais extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'credenciais';
    protected $primaryKey = 'CREDEN_CODIGO';
    protected $fillable = ['user_id','CREDEN_STATUS','CREDEN_DTEMISSAO','CREDEN_DTVALIDADE']; //ESPECIFICO EM QUAIS CAMPOS PODEM SER GRAVADOS
    
    public $rules = [
        'user_id' => 'required|numeric|unique:credenciais,user_id,((ID{?})),user_id',
        'CREDEN_STATUS' => 'required|max:200',
        'CREDEN_DTEMISSAO' => 'required|date',
        'CREDEN_DTVALIDADE' => 'required|date',
    ];            
            
}
