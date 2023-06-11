<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity', 'amount', 'vat', 'grandtotal', 'status', 'product_id', 'supplier_id'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }
}
