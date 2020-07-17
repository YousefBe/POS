<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded = [];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}