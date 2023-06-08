<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'color', 'size', 'description', 'quantity', 'price', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
