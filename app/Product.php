<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Product
 *
 * @mixin \Eloquent
 */
class Product extends Model
{

    use Sortable, SoftDeletes;

    public $sortable = ['name', 'proveedor' , 'cantidad' , 'precio'];

    protected $fillable = ['name', 'proveedor' , 'cantidad' , 'precio' , 'metric_id'];

    public function metric(){
        return $this->belongsTo(Metric::class);
    }

    public function ciclos(){
        return $this->belongsToMany(Ciclo::class);
    }

    /*public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof Ciclo) {
            return new CicloProductPivot($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }*/
}
