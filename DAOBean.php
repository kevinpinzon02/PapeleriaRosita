<?php


require_once('EmpleadoDAO.php');
require_once('EmpleadoDTO.php');


if(isset($_POST['registrar_empleado'])){
        
        $IDENTIFICACION = $_POST['identificacion_usu'];
        $tipo = $_POST['tipo_iden_usu'];
        $nombre = $_POST['nombre_usu'];
        $apellido = $_POST['apellido_usu'];
        $edad = $_POST['edad_usu'];
        $celular = $_POST['telefono_usu'];
        $rol = $_POST['rol_usu'];
        $estado = $_POST['estado_usu'];

                 $newusuario = new EmpleadoDAO(); 
              //$insert =  $newusuario ->insertar(NEW EmpleadoDTO($IDENTIFICACION ,$tipo, $nombre,$apellido,$rol,$edad,$estado,$celular));
        $eliminar = $newusuario ->eliminar(3988,1);
              // echo $insert;    
}



?>