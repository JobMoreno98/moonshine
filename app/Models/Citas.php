<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pacientes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Citas extends Model
{
    use HasFactory;
    protected $fillable = ['paciente_id', 'dia', 'hora_inicio', 'hora_fin', 'comentarios'];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Pacientes::class, 'paciente_id');
    }
}
