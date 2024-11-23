<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * Las columnas que se pueden llenar masivamente.
     */
    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'email',
        'phone',
        'address',
        'region',
        'user_id',
    ];

    /**
     * Relación: Un cliente pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
