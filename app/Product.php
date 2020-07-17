<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'selling_price', 'purchase_price', 'category_id', 'description', 'stock', 'Image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productImage()
    {
        return 'storage/uploads/products/' . $this->Image;
    }
    public function scopeSearch($query, $column, $value)
    {
        return $query
            ->where($column, 'like', '%' . $value . '%');
    }

    public function Order()
    {
        $this->belongsToMany(order::class);
    }
}