<?php
require_once('MySql.php');

class Bairro
{
    private $db;

    public function __construct()
    {
        $this->db = new MySql('bairros');
    }

    public function create($arrayBairro)
    {
         $this->db->inserir($arrayBairro);
    }
    public function buscarPorNomeCidadeId($nome, $cidades_id)
    {

        $where = "nome = '$nome' AND cidades_id = $cidades_id";
        $bairro = $this->db->buscar($where);
        if (!$bairro) {
            return false;
        } else {
            return $bairro[0];
        }
    }
    public function getBairro($nome, $cidades_id)
    {
        $bairro = $this->buscarPorNomeCidadeId($nome, $cidades_id);

        if ($bairro) {
            return $bairro;
        } else {
            $arrayBairro = [
                'nome' => $nome,
                'cidades_id' => $cidades_id
            ];

            $this->create($arrayBairro);
            $bairro = $this->buscarPorNomeCidadeId($arrayBairro['nome'], $arrayBairro['cidades_id']);
            return $bairro;
        }
    }

    public function buscarBairroPorId($bairros_id)
    {
       $where = "id = $bairros_id";
       $bairro = $this->db->buscar($where);
        if (!$bairro) {
            return false;
        } else {
            return $bairro[0];
        }
    }

    public function buscarBairroPorCidadesId($cidades_id)
    {
     $where = "cidades_id = $cidades_id";
     $bairro = $this->db->buscar($where);
     if (count($bairro) > 0) {
        return true;
    } else {
        return false;
    }
    }

    public function update($arrayBairro, $bairros_id)
    {
        $where = "bairros_id = $bairros_id" ; 
        return $this->db->atualizar($arrayBairro,$where);
    }

    public function deletarBairro($bairros_id)
    {
       $$where = "id = $bairros_id" ; 

       return $this->db->deletar($where);
    }
}
