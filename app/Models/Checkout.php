<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'address', 'direction', 'card_no', 'exp_date', 'cvv', 'total_quantity', 'vat', 'total_amount', 'grand_total', 'status', 'user_id', 'product_id'];
}
