<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    protected $guarded = ['id'];

    public function invoice()
    {
        return $this->hasMany('App\Invoices','customer_id');
    }
}
