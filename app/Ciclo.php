<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Ciclo
 *
 * @mixin \Eloquent
 */
class Ciclo extends Model
{

    use Sortable, SoftDeletes;

    public $sortable = ['densidad', 'precio_larva'];

    protected $fillable = ['planificacion_id' , 'piscina_id' , 'precio_larva' , 'densidad', 'created_at' , 'activo' ];

    public function planificacion(){
        return $this->belongsTo(Planificacion::class);
    }

    public function piscina(){
        return $this->belongsTo(Piscina::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)
            ->with('metric')
            ->withPivot('cantidad_aplicada' , 'metric_aplicada_id')
            ->orderBy('name', 'asc')
            ->withTimestamps();
    }

    public function insumos(){
        return $this->belongsToMany(Insumo::class)
            ->with('metric')
            ->withPivot('cantidad_aplicada' , 'metric_aplicada_id')
            ->orderBy('name', 'asc')
            ->withTimestamps();
    }

    /*public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof Product) {
            return new CicloProductPivot($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }*/


    /*public function hasCiclo($piscina){
        return $this->piscinas->contains($piscina);
    }*/
}
