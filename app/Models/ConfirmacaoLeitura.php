<?php

use MongoDB\Laravel\Eloquent\Model; 

class ConfirmacaoLeitura extends Model
{
    protected $connection = 'mongodb'; 

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


