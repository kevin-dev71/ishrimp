<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CicloProduct extends Model
{
    protected $table = 'ciclo_product';

    protected $fillable = ['ciclo_id' , 'product_id' , 'cantidad'];



}
