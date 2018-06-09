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
}
