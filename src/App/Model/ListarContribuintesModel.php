<?php

namespace Sidne\TesourariaBaba\App\Model;

class ListarContribuintesModel extends Conexao {

    public function pegarDados($request)
    {
        $totalArrecadado = $this->obterTotal($request['mes'], $request['ano']);
        $totalDespesas   = $this->obterTotalDespesas($request['mes'], $request['ano']);

        $sql = "SELECT * FROM contribuintes WHERE mes = '" . $request['mes'] . "' AND ano = '" . $request['ano'] . "' ORDER BY id DESC";
        $stmt = Conexao::connect()->prepare($sql);

        if(($stmt->execute()) and ($stmt->rowCount() > 0)) {

            $linhas = $stmt->fetchAll();

            $dados = [
                "total_despesas" => $totalDespesas,
                "total_pago" => $totalArrecadado,
                "dados"      => $linhas
            ];

            return $dados;
        }
        else {

            $dados["dados"] = null;
            return $dados;
        }
    }

    public function obterTotal($mes, $ano) {

        $sql  = "SELECT SUM(valor_pago) as total_pago FROM contribuintes WHERE mes = '".$mes."' AND ano = " . $ano;
        $stmt = Conexao::connect()->prepare($sql);

        if(($stmt->execute()) and ($stmt->rowCount() > 0)) {
            $linhas = $stmt->fetchAll();

            return $linhas;
        }
        else {

            return 0;
        }
    }

    public function obterTotalDespesas($mes, $ano) {

        $sql  = "SELECT SUM(valor_despesa) as valor_despesa FROM despesas WHERE mes = '".$mes."' AND ano = " . $ano;
        $stmt = Conexao::connect()->prepare($sql);

        if(($stmt->execute()) and ($stmt->rowCount() > 0)) {
            $linhas = $stmt->fetchAll();

            return $linhas;
        }
        else {

            return 0;
        }
    }
}