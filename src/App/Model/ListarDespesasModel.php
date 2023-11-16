<?php

namespace Sidne\TesourariaBaba\App\Model;

class ListarDespesasModel extends Conexao {

    public function pegarDados($request)
    {
        $sql = "SELECT * FROM despesas WHERE mes = '" . $request['mes'] . "' AND ano = '" . $request['ano'] . "' ORDER BY id DESC";
        $stmt = Conexao::connect()->prepare($sql);

        if(($stmt->execute()) and ($stmt->rowCount() > 0)) {

            $linhas = $stmt->fetchAll();

            return $linhas;
        }
        else {

            $dados["dados"] = null;
            return $dados;
        }
    }

}