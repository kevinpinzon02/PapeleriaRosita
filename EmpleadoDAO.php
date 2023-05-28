<?php


require_once('EmpleadoPOO.php');


$IDENTIFICACION = $_POST['identificacion_usu'];
$tipo = $_POST['tipo_iden_usu'];
$nombre = $_POST['nombre_usu'];
$apellido = $_POST['apellido_usu'];
$edad = $_POST['edad_usu'];
$celular = $_POST['telefono_usu'];
$rol = $_POST['rol_usu'];
$telefono = $_POST['telefono_usu'];
$estado = $_POST['estado_usu'];


        $newusuario = new Empleado1();

        $insert =  $newusuario ->insertar2($IDENTIFICACION ,$tipo, $nombre,$apellido,$rol,$edad,$estado,$celular);
       // $delete =  $newusuario ->eliminar(598 ,$tipo);

        echo $insert;

//$insertSQL= "INSERT  INTO  usuario VALUES (NULL,'".$IDENTIFICACION."',".$tipo.",'".$nombre."','".$apellido."','".$rol."',".$edad.",'".$estado."')";

/*

if (($result = mysqli_query($mysqli,$insertSQL)) === false) {
        echo "<br><center><li>Se encontro un erro verifica el archivo</center>";
                    
        echo "<br><center><li><a href='RegistrarEmpleadoVista.php'>VOLVER A OPCIONES</a></center>";
      exit();
}else {

        $consult= "SELECT id_usuario FROM usuario WHERE identificacion = $IDENTIFICACION";
        $result2 = mysqli_query($mysqli,$consult);
        $fila = mysqli_fetch_array($result2);
        $insertSQL2= "INSERT  INTO  telefono_usuario VALUES (".$fila[0].",'".$telefono."')";
        

        
        if (($result3 = mysqli_query($mysqli,$insertSQL2)) === false){

                echo "<br><center><li>no se inserto el telefono </center>";
                    
                echo "<br><center><li><a href='index.php'>VOLVER A OPCIONES</a></center>";
              exit();

        }else{
               
          
                echo "LOGRO";
                
        }
}
*/

?>