<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Piscina
 *
 * @mixin \Eloquent
 */
class Piscina extends Model
{
    use Sortable, SoftDeletes;

    public $sortable = ['finca_id', 'name' , 'area', 'created_at', 'updated_at'];

    protected $fillable = ['finca_id' , 'area' , 'name'];


    public function finca(){
        return $this->belongsTo(Finca::class);
    }

    public function ciclo(){
        return $this->belongsTo(Ciclo::class);
    }
}
