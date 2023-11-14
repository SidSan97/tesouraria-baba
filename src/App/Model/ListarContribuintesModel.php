<?php

namespace Sidne\TesourariaBaba\App\Model;

class ListarContribuintesModel extends Conexao {

    public function pegarDados()
    {
        $sql = "SELECT * FROM contribuintes ORDER BY id DESC";
        $stmt = Conexao::connect()->prepare($sql);

        if(($stmt->execute()) and ($stmt->rowCount() > 0)) {

            $linhas = $stmt->fetchAll();

            return $linhas;
        }
        else {

            return false;
        }
    }
}