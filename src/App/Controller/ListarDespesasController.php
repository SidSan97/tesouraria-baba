<?php

namespace Sidne\TesourariaBaba\App\Controller;

use Sidne\TesourariaBaba\App\Model\ListarDespesasModel;

class ListarDespesasController {

    public function listagemDespesas($request) {

        $meses = [
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro',
        ];

        if(!isset($_REQUEST['ano']) and !isset($_REQUEST['mes'])) {
            
            $request = [
                'mes' => $meses[date('m')],
                'ano' => date('Y')
            ];
        }
       
        $result = new ListarDespesasModel;
        $var    = $result->pegarDados($request);

        return $var;
    }

    public function pegarTotalEmCaixa()
    {
        $result = new ListarDespesasModel;
        $total = $result->calcularTotalEmCaixa();

        return $total;
    }
}