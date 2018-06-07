<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Finca
 *
 * @mixin \Eloquent
 */
class Finca extends Model
{

    use Sortable, SoftDeletes;

    public $sortable = ['name', 'total_area', 'created_at', 'updated_at'];


    public function piscinas(){
        return $this->hasMany(Piscina::class)->select('id' , 'fincas_id', 'area');
    }


}
