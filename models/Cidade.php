<?php

require_once('MySql.php');

class Cidade
{
    private $db;

    public function __construct()
    {
        $this->db = new MySql('cidades');
    }

    public function create($arrayCidade)
    {
        $this->db->inserir($arrayCidade);
    }

    public function buscarPorNomeEstadoId($nome, $estados_id)
    {

        $where = "nome = '$nome' AND estados_id = $estados_id";
        $cidade = $this->db->buscar($where);
        if (!$cidade) {
            return false;
        } else {
            return $cidade[0];
        }
    }

    public function buscarCidadePorId($cidades_id)
    {
       $where = "id = $cidades_id";
       $cidade = $this->db->buscar($where);
        if (!$cidade) {
            return false;
        } else {
            return $cidade[0];
        }
    }

    public function getCidade($nome, $estados_id)
    {
        $cidade = $this->buscarPorNomeEstadoId($nome, $estados_id);


        if ($cidade) {
            return $cidade;
        } else {

            $arrayCidade = [
                'nome' => $nome,
                'estados_id' => $estados_id
            ];

            $this->create($arrayCidade);
            $cidade = $this->buscarPorNomeEstadoId($arrayCidade['nome'], $arrayCidade['estados_id']);

            return $cidade;
        }
    }

    public function buscarCidadePorEstadosId($estados_id)
    {
       $where = "estados_id = $estados_id";
       $cidade = $this->db->buscar($where);
     if (count($cidade) > 0) {
        return true;
    } else {
        return false;
    }
    }

    public function deletarCidade($cidades_id)
    {
        $where = "id = $cidades_id";
        return $this->db->deletar($where);
    }

    public function atualizarCidade($arrayCidade, $estados_id,)
    {
       
    }
}
