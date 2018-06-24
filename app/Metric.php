<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Metric
 *
 * @mixin \Eloquent
 */
class Metric extends Model
{
    use Sortable, SoftDeletes;

    public $sortable = ['name', 'valor'];

    protected $fillable = ['name' , 'equivalente' , 'valor'];

    public function products(){
        return $this->belongsToMany(Product::class)->select('id' , 'metric_id', 'name' , 'proveedor' , 'cantidad' , 'precio');
    }

    public function insumos(){
        return $this->belongsToMany(Product::class)->select('id' , 'metric_id', 'name' , 'proveedor' , 'cantidad' , 'precio');
    }
}
