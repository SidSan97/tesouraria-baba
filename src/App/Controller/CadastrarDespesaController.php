<?php

namespace Sidne\TesourariaBaba\App\Controller;

use Sidne\TesourariaBaba\App\Model\CadastrarDespesasModel;

class CadastrarDespesaController {

    public function cadastroDespesa($request) {

        $cad = new CadastrarDespesasModel;
        $var = $cad->cadastrarDespesa($request);

        return $var;
    }
}