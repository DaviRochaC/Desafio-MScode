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
        $arrayInscrição['editado_em'] = date('Y-m-d H:i:s');  

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

            if (!isset($post[$chave]) or $post[$chave] == '') {
                return false;
            }
        }
        return true;
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


    public function deletarInscricao($id)
    {
        $where = "id = $id";
        return $this->db->deletar($where);
    }

    public function formataCpf($cpf)
    {
        $parteUm = substr($cpf, 0, 3);
        $parteDois = substr($cpf, 3, 3);
        $parteTres = substr($cpf, 6, 3);
        $parteQuatro = substr($cpf, 9, 3);
        $cpf = "$parteUm.$parteDois.$parteTres-$parteQuatro";
        return  $cpf;
    }

    public function validaCpf($cpf)

    {
        $cpf = $this->limpacpf($cpf);

        
        if (strlen($cpf) != 11) {
            return false;
        }
        
        if (preg_match('/([0-9])\1{10}/', $cpf)) {
            return false;
        }

        $D1 = 0;
        $D2 = 0;

        for ($i = 0, $x = 10; $i <= 8; $i++, $x--) {

            $D1 += $cpf[$i] * $x;
        }

        for ($i = 0, $x = 11; $i <= 9; $i++, $x--) {

            $D2 += $cpf[$i] * $x;

        }



        $R1 = (($D1 % 11) < 2) ? 0 : 11 - ($D1 % 11);
        $R2 = (($D2 % 11) < 2) ? 0 : 11 - ($D2 % 11);


        if ($R1 != $cpf[9] or $R2 != $cpf[10]) {
            return false;
        } else {
           return $cpf;
        }
    }
}
