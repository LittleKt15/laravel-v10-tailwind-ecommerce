<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = ['order_no', 'phone', 'card_holder', 'card_no', 'exp_date', 'cvc', 'address', 'state', 'zip', 'total_quantity', 'vat', 'total_amount', 'grand_total', 'status', 'user_id', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
