<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = "orderdetails";
    protected $fillable = [
        'name', 'price', 'quantity', 'image',
        'order_id'
    ];
}