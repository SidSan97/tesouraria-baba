<?php

namespace Sidne\TesourariaBaba\App\Controller;

use Sidne\TesourariaBaba\App\Model\ListarContribuintesModel;

class ListarContribuintesController {

    public function listagemContribuintes($request) {

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
                'mes' => $meses[date('n')],
                'ano' => date('Y')
            ];
        }
       
        $result = new ListarContribuintesModel;
        $var    = $result->pegarDados($request);

        return $var;
    }
}