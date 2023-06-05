<?php

//namespace persistence;
require_once('ConexionBD.php');

//use model\EmpleadoDTO;


class EmpleadoDAO
{
  private $conexion;
  private $empleadodto;

  function __construct()
  {

    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();


  }


  public function insertar($newempl)
  {
    $numero = 0;
    $encontrar = $this->buscar($newempl->getIdentificacion());
    if ($encontrar === false) {


      $sql = "INSERT INTO usuario values (?,?,?,?,?,?,?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $data = array(0, $newempl->getIdentificacion(), $newempl->getTipo(), $newempl->getNombre(), $newempl->getApellido(), $newempl->getRol(), $newempl->getEdad(), $newempl->getEstado(), null);
      if (($inse = $insert->execute($data)) === false) {

        $numero = 3;
      } else {
        $idinsert = $this->conexion->lastInsertId();
        $id2 = $idinsert;

        $sql2 = "INSERT INTO telefono_usuario values (?,?)";
        $insert2 = $this->conexion->prepare($sql2);
        $data2 = array($id2, $newempl->getTelefono());


        $numero = 1;
        if (($inse3 = $insert2->execute($data2)) === false) {
          $numero = 3;
        }

      }

    } else {
      $numero = 2;
    }
    return $numero;
  }


  public function identificar($ide, $contraseña)
  {
    try {

      $consult = "SELECT * FROM usuario WHERE identificacion =$ide AND contrasenia ='$contraseña' ";

      $result2 = $this->conexion->query($consult);
      $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
      if (($ersut) != null) {
        return true;
      } else {
        return false;
      }
    } catch (Exception $e) {
      return false;
    }


  }

  public function sacarid($ide)
  {
    try {
      $consult = "SELECT id_usuario FROM usuario WHERE identificacion = :ide ";
      $stmt = $this->conexion->prepare($consult);
      $stmt->bindParam(':ide', $ide);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result !== false) {
        return $result['id_usuario'];
      } else {
        return 0;
      }
    } catch (Exception $e) {
      return 0;
    }
  }


  public function buscar(int $ide)
  {
    $consult = "SELECT * FROM usuario WHERE identificacion =$ide";
    $result2 = $this->conexion->query($consult);
    $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut) != null) {
      return true;
    } else {
      return false;
    }

  }
  public function eliminar(int $ide)
  {
    $encontrar = $this->buscar($ide);

    if ($encontrar === true) {
      $eliminartelefeno = "DELETE FROM telefono_usuario WHERE id_usuario IN (SELECT id_usuario FROM usuario WHERE identificacion = $ide)";
      $elim = $this->conexion->prepare($eliminartelefeno);
      $eli = $elim->execute();

      if ($eli = $elim->execute() === false) {
        return 3;
      } else {

        $eliminarusuario = "DELETE FROM usuario WHERE identificacion = $ide";
        $elim = $this->conexion->prepare($eliminarusuario);
        $eli = $elim->execute();
        return 1;

      }
    } else {
      return 2;

    }
  }
  public function actualizar($empl)
  {
    $sql = "UPDATE usuario SET identificacion = ?, tipo_identificacion = ?, nombre = ?, apellido = ?, rol = ?, edad = ?, estado = ? WHERE identificacion = ?";
    $update = $this->conexion->prepare($sql);
    $data = array(
      $empl->getIdentificacion(),
      $empl->getTipo(),
      $empl->getNombre(),
      $empl->getApellido(),
      $empl->getRol(),
      $empl->getEdad(),
      $empl->getEstado(),
      $empl->getIdentificacion()
    );

    if (($upd = $update->execute($data)) === false) {
      echo "error";
    } else {
      $sql2 = "UPDATE telefono_usuario SET numero_usuario = ? where id_usuario IN (SELECT id_usuario FROM usuario WHERE identificacion = ?)";
      $update2 = $this->conexion->prepare($sql2);
      $data2 = array(
        $empl->getTelefono(),
        $empl->getIdentificacion()
      );
      if (($upd2 = $update2->execute($data2)) === false) {
        echo "hubo un erro";
      }
    }

  }



  public function getEmpleadodto()
  {
    return $this->empleadodto;
  }

  public function setEmpleadodto($empleadodto)
  {
    $this->empleadodto = $empleadodto;
  }


}
?>