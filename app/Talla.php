<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Talla
 *
 * @mixin \Eloquent
 */
class Talla extends Model
{
    use Sortable, SoftDeletes;

    public $sortable = ['name', 'peso'];

    protected $fillable = ['name' , 'peso'];
}
