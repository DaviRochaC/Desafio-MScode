<?php 
require_once('MySql.php');

class Usuario{
   private $db;

   public function __construct()
   {
       $this->db = new MySql('usuarios');
   }

   public function create($arrayUsuario)
   {
      $arrayUsuario['criado_em'] = date('Y-m-d H:i:s');
      $arrayUsuario['editado_em'] = date('Y-m-d H:i:s');
      
      return $this->db->inserir($arrayUsuario);
   }

   public function update($usuariosId,$arrayUsuario)
   {
      $where = "id = $usuariosId";

      return $this->db->atualizar($arrayUsuario, $where);

   }

   public function buscarTodosUsuarios()
   {
       return $this->db->buscar();
   }

   public function buscarUsuarioPorEmail($email)
   {
      $where = "email = '$email'";

      $user = $this->db->buscar($where);
        
      if(!$user){
          return false;
      }else{
          return $user[0];
      }

   }





}
