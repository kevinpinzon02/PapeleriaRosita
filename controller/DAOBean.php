<?php

session_start();
 

require_once('../persistence/EmpleadoDAO.php');
require_once('../model/EmpleadoDTO.php');

//use persistence\EmpleadoDAO;
//use model\EmpleadoDTO;

/*
require_once('ProveedorDAO.php');
require_once('ProveedorDTO.php');

require_once('PedidoDAO.php');
require_once('PedidoDTO.php');

*/




if (isset($_POST['registrar_empleado'])) {
      echo "gonorrea";
      $IDENTIFICACION = $_POST['identificacion_usu'];
      $tipo = $_POST['tipo_iden_usu'];
      $nombre = $_POST['nombre_usu'];
      $apellido = $_POST['apellido_usu'];
      $edad = $_POST['edad_usu'];
      $celular = $_POST['telefono_usu'];
      $rol = $_POST['rol_usu'];
      $estado = $_POST['estado_usu'];

      if ($tipo == 'seleccionar') {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ErrorComboTI();
                        </script>";

            redirigir($mensaje);
      }

      if ($rol == 'seleccionar') {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ErrorComboRol();
                        </script>";

            redirigir($mensaje);
      }

      if ($estado == 'seleccionar') {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ErrorComboEstado();
                        </script>";

            redirigir($mensaje);
      }

      $newusuario = new EmpleadoDAO();
      $insert = $newusuario->insertar(new EmpleadoDTO($IDENTIFICACION, $tipo, $nombre, $apellido, $rol, $edad, $estado, $celular));

      if ($insert === 1) {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.AgregarEmpleado();
                        </script>";

      }

      if ($insert === 2) {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ExisteEmpleado();
                        </script>";

      }

      redirigir($mensaje);
      //$eliminar = $newusuario ->eliminar(3988);
      // $actualizar =  $newusuario ->actualizar(NEW EmpleadoDTO($IDENTIFICACION ,$tipo, $nombre,$apellido,$rol,$edad,$estado,$celular)); 


      //$newprovedor = new ProveedorDAO(); 
      //$insert =  $newprovedor ->insertar(NEW ProveedorDTO("jota","653","dcj","pit","ase","A"));


}


function redirigir($mensaje){
      echo "aaaaaaaaaaa";
      setcookie("mensaje", $mensaje, time() + 3600, "/"); // Establecer la cookie con el mensaje
      $paginaPrincipal = 'RegistrarEmpleadoVista.php'; // Cambia 'index.php' por la URL de tu página principal
      header("Location: $paginaPrincipal");
      exit();
}


?>