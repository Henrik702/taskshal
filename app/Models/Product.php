<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function sender()
    {
        return $this->belongsTo(Sender::class);
    }
    public function boxes()
    {
        return $this->hasMany(OrderBoxe::class, 'order_id');
    }
}
