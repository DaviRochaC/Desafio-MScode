<?php
ini_set('display_erros', true);
error_reporting(E_ALL);
session_start();


require_once('MySql.php');


class Estado
{

    private $db;

    public function __construct()
    {
        $this->db = new MySql('estados');
   
    }

    public function create($arrayEstado)
    {
        $this->db->inserir($arrayEstado);
    }

    public function buscarTodosEstados()
    {
       return $this->db->buscar();
    }

    public function buscarEstadoPorSigla($sigla)
    {
        $where = "sigla = '$sigla'";
        $estado = $this->db->buscar($where);
        if (count($estado) > 0) {
            return $estado[0];
  
        }else{
            return false;
        }
    }

    public function getEstado($sigla)
    {
       
        $estado = $this->buscarEstadoPorSigla($sigla);
      
        if($estado){
          return $estado;
        }else{
            
            $arrayEstado = [
                'sigla' => $sigla,
            ];

            $this->create($arrayEstado);
            $estado = $this->buscarEstadoPorSigla($arrayEstado['sigla']);
            return $estado;
        }
    }

    public function buscarEstadoPorId($estados_id)
    {
       $where = "id = $estados_id";
       $estado = $this->db->buscar($where);
        if (count($estado) > 0) {
            return $estado[0];
  
        }else{
            return false;
        }
    }
    
    public function deletarEstado($estados_id)
    {
       $where = "id = $estados_id";
     return $this->db->deletar($where);
    }
}
