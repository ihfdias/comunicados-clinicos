<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'conteudo', 'urgente', 'anexo'];

    protected $casts = [
        'urgente' => 'boolean',
    ];
}
