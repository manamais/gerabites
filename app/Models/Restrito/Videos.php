<?php

namespace App\Models\Restrito;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Videos extends Model  implements AuditableContract
{
    use Auditable;
    use SoftDeletes;

    protected $table = 'videos';
    protected $primaryKey = 'VID_CODIGO';
    //protected $fillable = ['SUBCAT_CODIGO','user_id','VID_TITULO','VID_SLUG','VID_URL','VID_STATUS','VID_DESCRICAO','VID_TAGS','VID_DTINICIO','VID_DTTERMINO']; 
    protected $fillable = ['VID_TITULO','VID_URL','VID_DESCRICAO']; 
    public $rules = [
//        'SUBCAT_CODIGO' => 'required|numeric',
//        'user_id' => 'required|numeric',
//        'VID_SLUG' => 'required|max:140',
//        'VID_STATUS' => 'required|max:20',
//        'VID_TAGS' => 'required|max:255',
//        'VID_DTINICIO' => 'required|date',
//        'VID_DTTERMINO' => 'required|date',
        'VID_TITULO' => 'required|max:140',
        'VID_URL' => 'required|max:255',
        'VID_DESCRICAO' => '',
    ];

}