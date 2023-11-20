<?php 

namespace Sidne\TesourariaBaba\App\Model;

class CadastrarContribuintesModel extends Conexao{

    private $nome;
    private $nivel;
    private $valor_pago;
    private $data_pagamento;
    private $mes;
    private $ano;

    public function cadastrarContribuinte($request) {
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
        
        $this->nome  = $request['nome'];
        $this->nivel = $request['nivel'];
        $this->valor_pago     = $request['valor_pago'];
        $this->data_pagamento = $request['data_pagamento'];
        $this->mes = $request['mes'];
        $this->ano = date('Y');
        $id = 0;

        $stmt = $this->connect()->prepare('INSERT INTO contribuintes VALUES (?, ?, ?, ?, ?, ?, ?)');

            $stmt->bindParam(1, $id, \PDO::PARAM_INT);
            $stmt->bindParam(2, $this->nome, \PDO::PARAM_STR);
            $stmt->bindParam(3, $this->nivel, \PDO::PARAM_STR);
            $stmt->bindParam(4, $this->valor_pago, \PDO::PARAM_STR);
            $stmt->bindParam(5, $this->data_pagamento, \PDO::PARAM_STR);
            $stmt->bindParam(6, $this->mes, \PDO::PARAM_STR);
            $stmt->bindParam(7, $this->ano, \PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            }
            else 
                return false;
    }
}