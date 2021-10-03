<?php

require_once('MySql.php');

class Endereco
{
    private $db;

    public function __construct()
    {
        $this->db = new MySql('enderecos');
    }

    public function create($arrayEndereco)
    {
        $arrayEndereco['criado_em'] = date('Y-m-d H:i:s');
        $arrayEndereco['editado_em'] = date('Y-m-d H:i:s');

        $this->db->inserir($arrayEndereco);
    }

    public function buscarPorRuaNumeroCepBairroId($rua, $numero, $cep, $bairros_id)
    {
        $where = " rua = '$rua' AND numero = '$numero' AND cep ='$cep' AND bairros_id = $bairros_id ";

        $endereco = $this->db->buscar($where);
        if (!$endereco) {
            return false;
        } else {
            return $endereco[0];
        }
    }

    public function getEndereco($rua, $numero, $cep, $bairros_id, $complemento)
    {
        $endereco = $this->buscarPorRuaNumeroCepBairroId($rua, $numero, $cep, $bairros_id);

        if ($endereco) {
            return $endereco;
        } else {
            $arrayEndereco = [
                'rua' => $rua,
                'numero' => $numero,
                'cep' => $cep,
                'bairros_id' => $bairros_id,
                'complemento' => $complemento
            ];

            $this->create($arrayEndereco);
            $endereco = $this->buscarPorRuaNumeroCepBairroId($arrayEndereco['rua'], $arrayEndereco['numero'], $arrayEndereco['cep'], $arrayEndereco['bairros_id']);
            return $endereco;
        }
    }

    public function buscarTodosEnderecos()
    {
        return $this->db->buscar();
    }

    public function buscarEnderecoPorId($id)
    {
       $where = "id = $id";
       $endereco = $this->db->buscar($where);
        if (!$endereco) {
            return false;
        } else {
            return $endereco[0];
        }
    }

    public function buscarEndereçoPorBairrosId($bairros_id)
    {
        $where = "bairros_id = $bairros_id";
        $endereco = $this->db->buscar($where);
        if (count($endereco) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deletarEndereco($enderecos_id)
    {
        $where = "id = $enderecos_id";
        return $this->db->deletar($where);
    }
}
