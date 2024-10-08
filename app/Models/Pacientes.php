<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacientes extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pacientes';

    protected $fillable = ['nombre', 'domicilio', 'telefono', 'fecha_nacimiento', 'comentarios'];
}
