<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id', 'image'];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    // public function categories(){
    //     return $this->hasOne(Category::class, 'category_id');
    // }

    public function stock(){
        return $this->hasMany(Stock::class, 'product_id');
    }
}
