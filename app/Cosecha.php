<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cosecha extends Model
{

    protected $fillable = ['peso' , 'precio'];

    public function talla(){
        return $this->belongsTo(Talla::class);
    }

    public function ciclo(){
        return $this->belongsTo(Ciclo::class);
    }
}
