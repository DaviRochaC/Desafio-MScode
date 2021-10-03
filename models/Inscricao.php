<?php

require_once('MySql.php');

class Inscricao
{

    private $db;

    public function __construct()
    {
        $this->db = new MySql('inscricoes');
    }

    public function create($arrayInscrição)
    {
        $arrayInscrição['criado_em'] = date('Y-m-d H:i:s');
        $arrayInscrição['editado_em'] = date('Y-m-d H:i:s');

        return $this->db->inserir($arrayInscrição);
    }

    public function uptade($inscricaoId, $arrayInscrição)
    {
        $where = "id = $inscricaoId";
        return $this->db->atualizar($arrayInscrição, $where);
    }

    public function buscarTodasInscricoes()
    {
        return $this->db->buscar();
    }

    public function buscarInscricaoPorId($id)
    {
        $where = "id = '$id'";
        $inscricaoexistente =  $this->db->buscar($where);

        if (count($inscricaoexistente) > 0) {
            return $inscricaoexistente[0];
        } else {
            return false;
        }
    }


    public function verificaCampos($post, $chaves)

    {
        foreach ($chaves as $chave) {

            if (!isset($post[$chave]) or ($post[$chave] == '')) {
                $_SESSION['danger'] = 'Preencha todos os campos para prosseguir';
                header('Location:http://localhost/mscode/desafio/views/inscricoes/index.php#inscreva-se');
                die();
            }
        }
    }

    public function verificafoto($postfoto, $tamanhofoto)
    {
        if (!isset($postfoto) or $postfoto == '') {
            return false;
        }

        if (intval($tamanhofoto) <= 0) {
            return false;
        }
        
        return true;
    }

    public function buscarInscricaoPorCpf($cpf)
    {
        $where = "cpf = '$cpf'";
        $cpfexistente = $this->db->buscar($where);

        if (count($cpfexistente) > 0) {
            return $cpfexistente[0];
        } else {
            return false;
        }
    }

    public function buscarInscricaoPorEmail($email)
    {
        $where = "email = '$email'";
        $emailexistente =  $this->db->buscar($where);

        if (count($emailexistente) > 0) {
            return $emailexistente[0];
        } else {
            return false;
        }
    }
    
    public function buscarInscricaoPorEnderecosId($enderecos_id)
    {
        $where = "enderecos_id = $enderecos_id";
        $inscricaoexistente =  $this->db->buscar($where);

        if (count($inscricaoexistente) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function limpacpf($cpf)
    {
     return preg_replace("/[^0-9]/", '', $cpf);
    }

    public function limpacep($cep)
    {
     return str_replace('-', '', $cep);
    }

    public function deletarInscricao($id)
    {
        $where = "id = $id";
        return $this->db->deletar($where);
    }

    public function formataCpf($cpf)
    {
      $parteUm = substr($cpf,0,3);
      $parteDois = substr($cpf,3,3);
      $parteTres = substr($cpf,6,3);
      $parteQuatro= substr($cpf,9,3);
      $cpf = "$parteUm.$parteDois.$parteTres-$parteQuatro";
      return  $cpf;
    }



}
