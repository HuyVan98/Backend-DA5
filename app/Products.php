<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $fillable = [
        'name', 'slug', 'price', 'describer', 'info', 'featured', 'cat_id', 'image'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class, 'cat_id');
    }
    public function comments()
    {
        return $this->hasMany(Comments::class, 'prd_id');
    }
}