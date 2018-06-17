<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Insumo
 *
 * @mixin \Eloquent
 */
class Insumo extends Model
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
}
