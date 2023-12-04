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

    public function calcularTotalEmCaixa()
    {
        $sql  = "SELECT SUM(valor_pago) AS total_pago FROM contribuintes";
        $stmt = Conexao::connect()->prepare($sql);

        if(($stmt->execute()) and ($stmt->rowCount() > 0)) {

            $totalValorPago = $stmt->fetchAll();
        }

        $sql2  = "SELECT SUM(valor_despesa) AS total_pago FROM despesas";
        $stmt2 = Conexao::connect()->prepare($sql2);

        if(($stmt2->execute()) and ($stmt2->rowCount() > 0)) {

            $totalDesespesas = $stmt2->fetchAll();
        }

        $total = ($totalValorPago[0]['total_pago'] - $totalDesespesas[0]['total_pago']);
        
        return $total;
    }

}