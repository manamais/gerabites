<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Permission extends Model implements AuditableContract {

    use Auditable;
    use SoftDeletes;

    protected $table = 'permissions';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'label'];
    public $rules = [
        'name' => 'required|max:50|unique:permissions,name,((ID{?})),id',
        'label' => 'required|max:500'
    ];

    public function roles() {
        return $this->belongsToMany(\App\Models\Restrito\Role::class);
    }

}
