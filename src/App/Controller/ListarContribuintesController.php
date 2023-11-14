<?php 

namespace TesourariaBaba\App\Contoller;

use TesourariaBaba\App\Model\ListarContribuintesModel;

class ListarContribuintesController {

    public function cadastroContribuinte($request) {
        
        $cad    = new ListarContribuintesModel;
        $result = $cad->cadastrarContribuinte($request);
    }
}