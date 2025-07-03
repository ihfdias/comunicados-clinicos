<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comunicado;

class ComunicadoSeeder extends Seeder
{
    public function run(): void
    {
        Comunicado::insert([
            [
                'titulo' => 'Reunião Clínica Geral',
                'conteudo' => 'Informamos que haverá uma reunião com todo o corpo clínico na próxima segunda-feira às 14h no auditório principal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Atualização de Protocolos',
                'conteudo' => 'Os novos protocolos de atendimento estão disponíveis no portal interno. Todos devem estar atualizados até sexta-feira.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Treinamento Obrigatório',
                'conteudo' => 'Um novo treinamento de segurança será realizado no dia 15. Todos os médicos devem comparecer.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
