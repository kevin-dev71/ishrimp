<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cosecha extends Model
{

    protected $fillable = ['peso' , 'precio' , 'ciclo_id' , 'talla_id'];

    public function talla(){
        return $this->hasMany(Talla::class);
    }

    public function ciclo(){
        return $this->belongsTo(Ciclo::class);
    }
}
