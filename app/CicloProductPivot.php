<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CicloProductPivot extends Pivot
{
    protected $dates = ['cantidad'];
}