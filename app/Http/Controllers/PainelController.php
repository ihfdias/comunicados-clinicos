<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\ConfirmacaoLeitura;
use App\Models\User;

class PainelController extends Controller
{
   public function index()
   {
    $totalComunicados = Comunicado::count();
    $totalUrgentes = Comunicado::where('urgente', true)->count();
    $totalLeituras = ConfirmacaoLeitura::count();
    $usuariosQueLeram = ConfirmacaoLeitura::distinct('user_id')->count('user_id');
    $ultimoComunicado = Comunicado::latest()->first();

    return view('painel.index', compact(
        'totalComunicados',
        'totalUrgentes',
        'totalLeituras',
        'usuariosQueLeram',
        'ultimoComunicado',

    ));
   } 
}
