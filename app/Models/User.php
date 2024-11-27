<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens, HasFactory;
    
    protected $fillable = [
        "name",
        "username",
        "phone",
        "image",
        "email",
        "status",
        "password",
    ];

    protected $hidden = ["password", "remember_token"];

    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    // Relación con compañía (opcional)
    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    // Relación con compras
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    // Relación con puntos
    public function points()
    {
        return $this->hasMany(Point::class);
    }

    // Relación con clientes
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    // Scope para usuarios activos
    public function scopeActive($query)
    {
        return $query->where("status", "active");
    }

    // Scope para usuarios con un rol específico
    public function scopeWithRole($query, $role)
    {
        return $query->whereHas("roles", function ($query) use ($role) {
            $query->where("name", $role);
        });
    }

    // Método auxiliar: Verificar si tiene un rol específico
    public function hasSpecificRole(string $role): bool
    {
        return $this->hasRole($role);
    }

    // Método auxiliar: Obtener roles formateados como una cadena
    public function getFormattedRolesAttribute()
    {
        return $this->getRoleNames()->implode(", ");
    }
}
