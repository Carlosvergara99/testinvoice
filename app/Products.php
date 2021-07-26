<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Products extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];
}
