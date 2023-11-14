<?php 

namespace Sidne\TesourariaBaba\App\Contoller;

use Sidne\TesourariaBaba\App\Model\CadastrarContribuintesModel;

class CadastrarContribuintesController {

    public function cadastroContribuinte($request) {
        
        $cad    = new CadastrarContribuintesModel;
        $result = $cad->cadastrarContribuinte($request);

        return $result;
    }
}