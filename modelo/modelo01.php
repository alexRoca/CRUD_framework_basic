<?php

require './conexiones/conexion.php';

class consultasYregistros extends conexion{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function mostrarUsuarios(){
        $sql="select * from usuario";
        $resultado=$this->conec->prepare($sql);
        $resultado->execute();
        return $resultado;
    }
    
    public function registrarUsuario($dni, $nombre, $usuario, $clave){
        $sql="insert into usuario(dni, nombre, usuario, clave) value(".$dni.", '".$nombre."', '".$usuario."', '".$clave."')";
        $resultado=$this->conec->prepare($sql);
        $resultado->execute();
    }
    
    public function eliminarUsuario($dni){
        $sql="delete from usuario where dni=".$dni;
        $resultado=$this->conec->prepare($sql);
        $resultado->execute();
    }
    
    public function modificarUsuario($dni, $nombre, $usuario, $clave){
        $sql="update usuario set nombre='".$nombre."',usuario='".$usuario."', clave='".$clave."' where dni=".$dni;
        $resultado=$this->conec->prepare($sql);
        $resultado->execute();
    }
    
    public function mostrarUnUsuario($dni){
        $sql="select * from usuario where dni=".$dni;
        $resultado=$this->conec->prepare($sql);
        $resultado->execute();
        return $resultado;
    }
    
}

