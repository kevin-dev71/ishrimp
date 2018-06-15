<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Finca
 *
 * @mixin \Eloquent
 */
class Finca extends Model
{

    use Sortable, SoftDeletes;

    public $sortable = ['name', 'total_area', 'created_at', 'updated_at'];

    protected $fillable = ['name' , 'total_area'];


    public function piscinas(){
        return $this->hasMany(Piscina::class)->select('id' , 'finca_id', 'area' , 'name');
    }

    public function planificaciones(){
        return $this->hasMany(Planificacion::class);
    }

    public function getTotalPiscinasAttribute()
    {
        return $this->hasMany(Piscina::class)->whereFincaId($this->id)->count();
    }

    public function getPiscinasSinSembrarAttribute(){
        /*return $this->hasMany(Piscina::class)
            ->leftJoin('ciclos', 'ciclos.piscina_id', '=', 'piscinas.id')
            ->select('piscinas.id' , 'piscinas.finca_id', 'piscinas.area' , 'piscinas.name')
            ->where(function ($query){
                $query->where('ciclos.activo' , 0)
                    ->orWhereNull('ciclos.piscina_id');
            })
            ->get();*/
        return $this->hasMany(Piscina::class)
            ->leftJoin('ciclos', 'ciclos.piscina_id', '=', 'piscinas.id')
            ->select('piscinas.id' , 'piscinas.finca_id', 'piscinas.area' , 'piscinas.name')
            ->WhereNull('ciclos.piscina_id')
            ->get();

    }

    public function getPiscinasSembradasAttribute(){
        return $this->hasMany(Piscina::class)
            ->leftJoin('ciclos', 'ciclos.piscina_id', '=', 'piscinas.id')
            ->select('piscinas.id' , 'piscinas.finca_id', 'piscinas.area' , 'piscinas.name' , 'ciclos.created_at as ciclo_created_at' , 'ciclos.precio_larva' , 'ciclos.densidad' , 'ciclos.id as ciclo_id')
            ->whereNotNull('ciclos.piscina_id')
            ->whereNull('ciclos.deleted_at')
            ->get();
    }

}
