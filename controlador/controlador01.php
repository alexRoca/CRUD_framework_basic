<?php

include './modelo/modelo01.php';

class controlador001 {
    
    protected $consulta;
    
    public function __construct(){
        $this->consulta=new consultasYregistros();
        if($_GET){
            //el isset permite validar el GET o POST sin q salga error
            if(isset($_GET['actionForm'])){
                $actionForm=$_GET['actionForm'];
                $this->$actionForm();
            }else{
                $actionForm="<script>$('#pruebaJeje').attr('action');</script>";
                echo "no se coloco acttion en el form ".$actionForm;
            }
        }else{
            if($_POST){
                //el isset permite validar el GET o POST sin q salga error
                if(isset($_POST['actionForm'])){
                    $actionForm=$_POST['actionForm'];
                    $this->$actionForm();
                }else{
                    $actionForm="<script>$('#pruebaJeje').attr('action');</script>";
                    echo "no se coloco acttion en el form ".$actionForm;
                }
            }else{
                $this->index();
                /*echo url_base();*/
                //esto demuestra como se usa o captura la url, esta se ve en la carpeta configuracion/funciones y en el index principal
            }
        }
    }
    
    public function index(){
        /*$datosUsuario='jojolete';*/
        // solo se uso para probar como se envia los datos a las vistas
        $dniPaOperacion=0;
        $listaUsuarios=$this->consulta->mostrarUsuarios();
        require '././vista/vistaInicial.php';
    }
    
    public function registroUsuario(){
        //require '././vista/prueba.php';
        $dni=$_POST['dni'];
        $nombre=$_POST['nombre'];
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        
        $this->consulta->registrarUsuario($dni, $nombre, $usuario, $clave);
        $this->index();
    }
    
    public function eliminarUnUsuario(){
        $dni=$_GET['dni'];
        $this->consulta->eliminarUsuario($dni);
        $this->index();
    }
    
    public function mostrarUsuModif(){
        $dniPaOperacion=$_GET['dni'];
        $datosUsuario=$this->consulta->mostrarUnUsuario($dniPaOperacion);
        $listaUsuarios=$this->consulta->mostrarUsuarios();
        require '././vista/vistaInicial.php';
    }
    
    public function modificarUsuario(){
        $dni=$_POST['dni'];
        $nombre=$_POST['nombre'];
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        $this->consulta->modificarUsuario($dni, $nombre, $usuario, $clave);
        $this->index();
    }
    
    public function prueba(){
        $dni=$_POST['actionForm'];
    }
    
}

