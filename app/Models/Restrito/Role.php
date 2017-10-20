<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Role extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'label'];
    public $rules = [
        'name' => 'required|max:50|unique:roles,name,((ID{?})),id',
        'label' => 'required|max:500'
    ];

    public function permissions() {
        return $this->belongsToMany(\App\Models\Restrito\Permission::class);
    }

}
