<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'Image'];

    public function ClientImage()
    {
        return 'storage/uploads/clients/' . $this->Image;
    }
    public function scopeSearch($query, $column, $column2, $value)
    {
        return $query
            ->where($column, 'like', '%' . $value . '%')
            ->orWhere($column2, 'like', '%' . $value . '%');
    }

    public function Orders()
    {
        return $this->hasMany(order::class);
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}