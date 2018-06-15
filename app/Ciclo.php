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

    public function planificaciones(){
        return $this->hasMany(Planificacion::class);
    }

    public function piscinas(){
        return $this->hasMany(Piscina::class);
    }

    /*public function hasCiclo($piscina){
        return $this->piscinas->contains($piscina);
    }*/
}
