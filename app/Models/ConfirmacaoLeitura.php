<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmacaoLeitura extends Model
{
    protected $fillable = ['user_id', 'comunicado_id', 'lido_em'];

    public function comunicado()
    {
        return $this->belongsTo(Comunicado::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

