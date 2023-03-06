<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_nome', 'empresa_id'];

    /**
     * Pega os clientes
     */
    public function clientes() {
        return $this->hasMany(Cliente::class);
    }

    /**
     * Pega a empresa
     */
    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }
}
