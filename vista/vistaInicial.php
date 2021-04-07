<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php //echo $datosUsuario; 
              //esto solo fue para probar como se envia datos a otra vista
        ?>
    <center>
        <table border="1">
            <tr><td>DNI</td><td>NOMBRE</td><td>USUARIO</td><td>CLAVE</td></tr>
            <?php
            foreach($listaUsuarios as $fila){
                echo "<tr><td>".$fila['dni']."</td><td>".$fila['nombre']."</td><td>".$fila['usuario']."</td><td>".$fila['clave']."</td><td><a href='http://localhost:8099/CRUD_framework_basic/mostrarUsuModif?actionForm=mostrarUsuModif&dni=".$fila['dni']."'>EDITAR</a></td><td><a href='http://localhost:8099/CRUD_framework_basic/eliminarUnUsuario?actionForm=eliminarUnUsuario&dni=".$fila['dni']."'>ELIMINAR</a></td></tr>";
            }
            ?>
        </table>
        <?php
        
        if($dniPaOperacion!=0){
            foreach ($datosUsuario as $row){
                $dni=$row['dni'];
                $nombre=$row['nombre'];
                $usuario=$row['usuario'];
                $clave=$row['clave'];
            }
        }
        
        ?>

        <form action="<?php if($dniPaOperacion!=0){echo "modificarUsuario";}else{echo "registroUsuario";}?>" method="POST" name="pruebaJeje" id="pruebaJeje" onsubmit="captura();"><!--onsubmit te permite ejecutar un js antes de enviar un submit-->
            <input type="number" name="dni" placeholder="escribe el dni" <?php if($dniPaOperacion!=0){echo "value=".$dni." readonly='readonly'";}?>>
            <input type="text" name="nombre" placeholder="escribe el nombre" <?php if($dniPaOperacion!=0){echo "value='".$nombre."'";}?>>
            <input type="text" name="usuario" placeholder="escribe el usuario" <?php if($dniPaOperacion!=0){echo "value='".$usuario."'";}?>>
            <input type="text" name="clave" placeholder="escribe la clave" <?php if($dniPaOperacion!=0){echo "value='".$clave."'";}?>>
            <div id="divActionForm" name="divActionForm"></div><!--este div es para capturar el action del form y enviarlo-->
            <a href="http://localhost:8099/CRUD_framework_basic/">LIMPIAR</a>
            <input type="submit" name="btnEnviar" value="<?php if($dniPaOperacion!=0){echo "modificar usuario";}else{echo "registrar usuario";}?>">
        </form>
        
    </center>
</body>
<script src="index.php ../../jquery/jquery-3.2.1.js" type="text/javascript"></script>
<script src="index.php ../../js/enviarActionForm.js" type="text/javascript"></script>
<!--<script>alert($('#pruebaJeje').attr('action'));</script>--><!--captura action de formulario-->
<!--<script>$("#divActionForm").html('<input type="hidden" name="actionForm" value="'+$('#pruebaJeje').attr('action')+'">');</script>--><!--genera html con javascript-->
</html>
