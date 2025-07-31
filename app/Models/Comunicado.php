<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Comunicado extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'conteudo', 'urgente', 'anexo'];

    protected $casts = [
        'urgente' => 'boolean',
    ];
}
