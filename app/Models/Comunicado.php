<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comunicado extends Eloquent
{
    use HasFactory;

    protected $fillable = ['titulo', 'conteudo', 'urgente', 'anexo'];

    protected $casts = [
        'urgente' => 'boolean',
    ];
}
