<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = 'invoices';
    protected $guarded = ['id'];
    
    public function customer()
    {
        return $this->belongsTo(Customers::class,'customer_id');
    }
    
    public function invoiceproduct()
    {
         return $this->belongsToMany('App\Invoices', 'invoicesproducts', 'invoice_id','id')->withPivot('product_id','status','amount','total_value');
    }
    public function product()
    {
        return $this->belongsToMany('App\Products', 'invoicesproducts','id' ,'product_id');
    }
}
