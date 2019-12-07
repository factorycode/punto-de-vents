<?php
class Usuarios_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function getLogin($correo,$password)
    {
        $query=$this->db
        ->select("id_usuario,nombre,correo,password,apellidos, privilegio")
        ->from("usuarios")
        ->where(array('correo'=>$correo,'password'=>$password, 'estado'=>1))
        ->get();
        //echo $this->db->last_query();exit;        
        return $query->row();            
    }
    public function getUsuarios(){
        $this->db->select("u.id_usuario,u.nombre,u.apellidos, u.correo,u.privilegio,u.estado, r.nombre as nombre_rol,r.id");
        $this->db->from("usuarios u");
        $this->db->join("roles r","u.privilegio = r.id ");
        $resultados = $this->db->get();
        return $resultados->result();
    }
    
    public function save($data){
        return $this->db->insert("usuarios",$data);
    }
    public function update($id_usuario,$data){
        $this->db->where("id_usuario",$id_usuario);
        return $this->db->update("usuarios",$data);
    }
    public function getUsuarioPorid($id_usuario)
    {
     $where = array(
        "id_usuario" => $id_usuario
    );
     $query = $this->db->select("id_usuario,nombre,apellidos,telefono, correo,privilegio")->from("usuarios")->where($where)->get();
     return $query->row(); 
 }
 public function modificar_usuario($datos = array(), $id_usuario)
 {
    $this->db->where('id_usuario', $id_usuario);
    $this->db->update('usuarios', $datos);
    return true;

}
public function getRol()
{
    $query=$this->db
    ->select("id,nombre")
    ->from("roles")
    ->get();
        //echo $this->db->last_query();exit;        
    return $query->result();         

}


}

