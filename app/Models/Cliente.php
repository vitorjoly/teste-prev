<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_nome', 'usuario_id'];

    /**
     * Pega os usuarios
     */
    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }
}
