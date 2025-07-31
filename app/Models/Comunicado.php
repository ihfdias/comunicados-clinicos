<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comunicado extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = ['titulo', 'conteudo', 'urgente', 'anexo'];

    protected $casts = [
        'urgente' => 'boolean',
    ];
}
