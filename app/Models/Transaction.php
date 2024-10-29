<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'point_id',
        'product_id',
        'amount_used',
    ];

    public function point()
    {
        return $this->belongsTo(Point::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
