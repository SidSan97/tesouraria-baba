<?php 

namespace Sidne\TesourariaBaba\App\Model;

class CadastrarDespesasModel extends Conexao{

    private $descricao;
    private $valor;
    private $data;
    private $mes;
    private $ano;

    public function cadastrarDespesa($request) {
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
        
        $this->descricao  = $request['descricao'];
        $this->data       = $request['data'];
        $this->valor      = $request['valor'];
        $this->mes = $meses[date('n')];
        $this->ano = date('Y');
        $id = 0;

        $stmt = $this->connect()->prepare('INSERT INTO despesas VALUES (?, ?, ?, ?, ?, ?)');

            $stmt->bindParam(1, $id, \PDO::PARAM_INT);
            $stmt->bindParam(2, $this->descricao, \PDO::PARAM_STR);
            $stmt->bindParam(3, $this->data, \PDO::PARAM_STR);
            $stmt->bindParam(4, $this->valor, \PDO::PARAM_STR);
            $stmt->bindParam(5, $this->mes, \PDO::PARAM_STR);
            $stmt->bindParam(6, $this->ano, \PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;             
            }
            else {
               return false;
            }
    }
}