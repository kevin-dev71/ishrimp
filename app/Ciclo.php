<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Ciclo
 *
 * @mixin \Eloquent
 */
class Ciclo extends Model
{
    public function planificaciones(){
        return $this->belongsToMany(Planificacion::class);
    }
}
