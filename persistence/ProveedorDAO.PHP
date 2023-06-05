<?php

require_once('ConexionBD.php');
require_once('ProveedorDAO.php');

/**
 * Clase ProveedorDAO
 * 
 * Esta clase proporciona métodos para realizar operaciones relacionadas con proveedores en la base de datos.
 */
class ProveedorDAO
{
  /**
   * @var PDO Objeto de conexión a la base de datos
   */
  private $conexion;

  /**
   * Constructor de la clase ProveedorDAO.
   * 
   * Crea una instancia de la clase Conexion y establece la conexión a la base de datos.
   */
  function __construct()
  {

    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();

  }

/**
   * Inserta un nuevo proveedor en la base de datos.
   * 
   * @param Proveedor $newempl El proveedor a insertar
   * @return int El número que indica el resultado de la operación:
   *             0: Error al insertar el proveedor
   *             1: Proveedor insertado correctamente
   *             2: El proveedor ya existe en la base de datos
   */
  public function insertar($newempl)
  {
    $numero = 0;
    $encontrar = $this->buscar($newempl->getNit());
    if ($encontrar === false) {


      $sql = "INSERT INTO proveedor values (?,?,?,?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $data = array(
        0,
        $newempl->getNombre(),
        $newempl->getDireccion(),
        $newempl->getNit(),
        $newempl->getAsesor(),
        $newempl->getEstado()
      );
      if (($inse = $insert->execute($data)) === false) {

        $numero = 0;
      } else {
        $idinsert = $this->conexion->lastInsertId();
        $id2 = $idinsert;
        echo "insertar despues: " . $id2 . " depues de la insert";
        $sql2 = "INSERT INTO telefono_proveedor values (?,?)";
        $insert2 = $this->conexion->prepare($sql2);
        $data2 = array($id2, $newempl->getTelefono());
        $numero = 1;

        if (($inse3 = $insert2->execute($data2)) === false) {
          $numero = 0;
        }
      }

    } else {
      $numero = 2;
    }

    return $numero;
  }

/**
   * Busca un proveedor por su número de identificación tributaria (NIT).
   * 
   * @param string $ide El NIT del proveedor a buscar
   * @return bool Retorna true si el proveedor existe en la base de datos, de lo contrario retorna false.
   */
  public function buscar(String $ide)
  {
    $consult = "SELECT * FROM proveedor WHERE nit = '$ide'";
    $result2 = $this->conexion->query($consult);
    $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut) != null) {
      return true;
    } else {
      return false;
    }

  }

/**
   * Busca un proveedor por su ID.
   * 
   * @param int $ide El ID del proveedor a buscar
   * @return bool Retorna true si el proveedor existe en la base de datos, de lo contrario retorna false.
   */
  public function buscar_id(int $ide)
  {
    $consult = "SELECT * FROM proveedor WHERE id_proveedor = $ide";
    $result2 = $this->conexion->query($consult);
    $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut) != null) {
      return true;
    } else {
      return false;
    }

  }
  /**
   * Elimina un proveedor de la base de datos.
   * 
   * @param string $ide El NIT del proveedor a eliminar
   * @return int El número que indica el resultado de la operación:
   *             0: Error al eliminar el proveedor
   *             1: Proveedor eliminado correctamente
   *             2: El proveedor no existe en la base de datos
   */
  public function eliminar(String $ide)
  {
    $number = 0;
    $encontrar = $this->buscar($ide);

    if ($encontrar === true) {
      $eliminartelefeno = "DELETE FROM telefono_proveedor WHERE id_proveedor IN (SELECT id_proveedor FROM proveedor WHERE nit = '$ide')";
      $elim = $this->conexion->prepare($eliminartelefeno);
      $eli = $elim->execute();

      if ($eli = $elim->execute() === false) {
        echo "no se borro";
      } else {

        $eliminartelefeno = "DELETE FROM proveedor WHERE nit = '$ide'";
        $elim = $this->conexion->prepare($eliminartelefeno);
        $eli = $elim->execute();
        
        $number = 1;

      }
    } else {
      $number = 2;

    }
    return $number;
  }
  /**
   * Actualiza los datos de un proveedor en la base de datos.
   * 
   * @param Proveedor $empl El proveedor con los datos actualizados
   */
  public function actualizar($empl)
  {
    $sql = "UPDATE proveedor SET nombre = ?, direccion = ?, nit = ?, asesor = ?, estado = ? WHERE nit = ?";
    $update = $this->conexion->prepare($sql);
    $data = array(
      $empl->getNombre(),
      $empl->getDireccion(),
      $empl->getNit(),
      $empl->getAsesor(),
      $empl->getEstado(),
      $empl->getNit()
    );

    if (($upd = $update->execute($data)) === false) {
      echo "error";
    } else {
      $sql2 = "UPDATE telefono_proveedor SET numero_proveedor = ? where id_proveedor IN (SELECT id_proveedor FROM proveedor WHERE nit = ?)";
      $update2 = $this->conexion->prepare($sql2);
      $data2 = array($empl->getNit(), $empl->getTelefono());
      if (($upd2 = $update2->execute($data2)) === false) {
        echo "hubo un erro";
      }
    }

  }



}
?>