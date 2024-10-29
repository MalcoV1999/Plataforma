<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'status',
        'image',
        'points_price',
        'category_id',
        'region_id',
        'point_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class ,'category_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function points()
    {
        return $this->belongsTo(Point::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
