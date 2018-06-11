<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planificacion extends Model
{

    use Sortable, SoftDeletes;

    public $timestamps = false;

    protected $table = 'planificaciones';

    public $sortable = ['finca_id' , 'ciclo' , 'fecha_inicial' , 'fecha_final'];

    protected $fillable = ['finca_id' , 'ano' , 'ciclo', 'fecha_inicial' , 'fecha_final'];

    public function fincas(){
        return $this->belongsToMany(Finca::class);
    }
}
