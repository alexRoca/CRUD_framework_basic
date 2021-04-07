<?php

class conexion {
    
    protected $conec;
    
    public function __construct(){
        
        try{
            $this->conec=new PDO("mysql:host=localhost; dbname=baseprueba","root","123");
        }catch(exception $e){
            
        }
        
    }
    
}