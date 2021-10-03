<?php 
require_once('MySql.php');

class Admin{
   private $db;

   public function __construct()
   {
       $this->db = new MySql('admin');
   }

   public function create($arrayAdmin)
   {
      $arrayAdmin['criado_em'] = date('Y-m-d H:i:s');
      $arrayAdmin['editado_em'] = date('Y-m-d H:i:s');
      
      return $this->db->inserir($arrayAdmin);
   }


   public function buscarUsuarioAdminPorId($usuarios_id)
   
    {
        $where = "usuarios_id= $usuarios_id";
  
        $admin= $this->db->buscar($where);
          
        if(!$admin){
            return false;
        }else{
            return $admin[0];
        }
  
     }
   





}
