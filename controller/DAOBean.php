<?php

session_start();


require_once('../persistence/EmpleadoDAO.php');
require_once('../model/EmpleadoDTO.php');

require_once('../persistence/conexion.php');

require_once('../persistence/ProductoDAO.php');
require_once('../model/ProductoDTO.php');

require_once('../persistence/VentaDAO.php');
require_once('../model/VentaDTO.php');

require_once('../persistence/CompraDAO.php');
require_once('../model/CompraDTO.php');



require_once('../persistence/conexion.php');
echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

echo "<script src='js/Mensajes.js'></script>";
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'%3E></script>";



//use persistence\EmpleadoDAO;
//use model\EmpleadoDTO;

/*
require_once('ProveedorDAO.php');
require_once('ProveedorDTO.php');

require_once('PedidoDAO.php');
require_once('PedidoDTO.php');

*/


if (isset($_POST['iniciar_sesion'])) {
      $nombre_usuario = $_POST['nombre_usu'];
      $contrasena = $_POST['password_usu'];


      $newusuario = new EmpleadoDAO();
      $log = $newusuario->identificar($nombre_usuario, $contrasena);
      if ($log === true) {
          
              $_SESSION['identificacion'] = $nombre_usuario;

              $paginaPrincipal = '../view/RegistrarEmpleadoVista.php'; 
              header("Location: $paginaPrincipal");
              echo "se registro";
              exit();
        
      } else {
          // Mostrar mensaje de error
          echo 'swal("Error", "Usuario no encontrado", "error");';
      }
  
}

if (isset($_POST['registrar_empleado'])) {
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

            redirigirRegistrarEmpleado($mensaje);
      }

      if ($rol == 'seleccionar') {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ErrorComboRol();
                        </script>";

            redirigirRegistrarEmpleado($mensaje);
      }

      if ($estado == 'seleccionar') {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ErrorComboEstado();
                        </script>";

            redirigirRegistrarEmpleado($mensaje);
      }


     $newusuario = new EmpleadoDAO();
     $insert = $newusuario->insertar(new EmpleadoDTO($IDENTIFICACION, $tipo, $nombre, $apellido, $rol, $edad, $estado, $celular));
      //$newprocuto = new ProductoDAO();
      //$insert2 = $newprocuto->actualizar(new ProductoDTO("pasta", 99, 99, 1199, "jabon fea", "act",17));
      //$eliminar =$newprocuto->eliminar("papa");
       //compra///
       
      $newcompra = new CompraDAO();
      $insert2 = $newcompra->insertar(new CompraDTO(3666, "2002-09-12", 1, "detalle compra", "act",$obterid , $productos,"45"));

      //VENTA//
      /*
      $productos = array();
      $productos[] = new ProductoDTO("papa", 3698,50, 6, "jabon fea", "act",2);
      $productos[] = new ProductoDTO("aji", 999, 11, 5, "jabon fea", "act",3);
      $productos[] = new ProductoDTO("cepillo", 68, 99, 0, "jabon fea", "act",4);
      $productos[] = new ProductoDTO("pasta", 99, 99, 9, "jabon fea", "act",5);
      $idde=$nombre = $_SESSION['identificacion'];
      $obterid= $newusuario->sacarid($idde);
      echo "este es el id " .$obterid. " este es el id de usuario : ".$idde;
      $newventa = new VentaDAO();
      $insert = $newventa->insertar(new VentaDTO(3666, "2002-09-12", "varias venta", "act", $obterid, "23", $productos));
      */
      // $newventa = new VentaDAO();
      //$insert = $newventa->eliminar(23);

 



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


      redirigirRegistrarEmpleado($mensaje);
      // $actualizar =  $newusuario ->actualizar(NEW EmpleadoDTO($IDENTIFICACION ,$tipo, $nombre,$apellido,$rol,$edad,$estado,$celular)); 
      //$newprovedor = new ProveedorDAO(); 
      //$insert =  $newprovedor ->insertar(NEW ProveedorDTO("jota","653","dcj","pit","ase","A"));
}

if (isset($_POST['eliminaremp'])) {

      $mensaje = "<script>
                  const instancia = new Mensajes();
                  instancia.EliminarEmpleado();
                  </script>";

      redirigirEliminarEmpleado($mensaje);

}
  if (isset($_POST['valor'])) {
      $valor = $_POST['valor'];
      $newusuario = new EmpleadoDAO();
      $eliminar = $newusuario->eliminar($valor);
    
      $response = array('valor' => $eliminar);
    
      header('Content-Type: application/json');
      echo json_encode($response);
      exit; // Terminar la ejecución del script aquí
  }
  




function redirigirRegistrarEmpleado($mensaje)
{
      setcookie("mensaje", $mensaje, time() + 3600, "/"); // Establecer la cookie con el mensaje
      $paginaPrincipal = '../view/RegistrarEmpleadoVista.php'; // Cambia 'index.php' por la URL de tu página principal
      header("Location: $paginaPrincipal");
      exit();
}

function redirigirEliminarEmpleado($mensaje)
{
      setcookie("mensaje", $mensaje, time() + 3600, "/");
      $paginaPrincipal = '../view/MenuEmpleadoVista.php';
      header("Location: $paginaPrincipal");
      exit();
}


?>