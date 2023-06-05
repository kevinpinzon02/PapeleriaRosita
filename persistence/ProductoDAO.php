<?php
//namespace persistence;

require_once('ConexionBD.php');

//use model\EmpleadoDTO;

/**
 * Clase ProductoDAO
 *
 * Esta clase se encarga de realizar operaciones CRUD (Create, Read, Update, Delete) en la tabla "producto" de la base de datos.
 */
class ProductoDAO
{
  /**
   * Objeto de conexión a la base de datos.
   *
   * @var PDO
   */
  private $conexion;

  /**
   * Objeto ProductoDTO utilizado para acceder a los datos del producto.
   *
   * @var ProductoDTO
   */
  private $prodcutodto;

  /**
   * Constructor de la clase ProductoDAO.
   *
   * Inicializa la conexión a la base de datos utilizando la clase Conexion y asigna el resultado a la variable $conexion.
   */
  function __construct()
  {

    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();

  }
   /**
   * Inserta un nuevo producto en la tabla "producto".
   *
   * @param ProductoDTO $newproc Objeto ProductoDTO que contiene los datos del producto a insertar.
   * @return int Retorna un número que indica el resultado de la operación:
   *              - 0: Error al ejecutar la inserción.
   *              - 1: Inserción exitosa.
   *              - 2: El producto ya existe en la base de datos.
   */
  public function insertar($newproc)
  {
    $numero = 0;

    $encontrar = $this->buscar($newproc->getNombreProducto());
    if ($encontrar === false) {


      $sql = "INSERT INTO producto values (?,?,?,?,?,?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $data = array(
        0, $newproc->getNombreProducto(),
        $newproc->getValorCompra(),
        $newproc->getValorVenta(),
        $newproc->getCantidad(),
        $newproc->getDetalleProducto(),
        $newproc->getEstado(),
        $newproc->getCodigo()
      );
      $numero = 1;
      if (($inse = $insert->execute($data)) === false) {

        $numero = 0;
      }
    } else {
      $numero = 2;
    }
    return $numero;
  }


/**
   * Busca un producto en la tabla "producto" por su nombre.
   *
   * @param string $ide Nombre del producto a buscar.
   * @return bool Retorna true si el producto se encuentra en la base de datos, de lo contrario, retorna false.
   */
  public function buscar(String $ide)
  {
    $consult = "SELECT * FROM producto WHERE nombre_producto = '$ide'";
    $result2 = $this->conexion->query($consult);
    $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut) != null) {
      return true;
    } else {
      return false;
    }

  }
/**
   * Elimina un producto de la tabla "producto" por su nombre.
   *
   * @param string $ide Nombre del producto a eliminar.
   * @return int Retorna un número que indica el resultado de la operación:
   *              - 0: Error al ejecutar la eliminación.
   *              - 1: Eliminación exitosa.
   *              - 2: El producto no existe en la base de datos.
   */
  public function eliminar($ide)
  {
    $encontrar = $this->buscar($ide);
    $encontrar = $this->buscar($ide);

    if ($encontrar === true) {
      $eliminarproducto = "DELETE FROM producto WHERE nombre_producto = '$ide'";
      $elim = $this->conexion->prepare($eliminarproducto);
      $eli = $elim->execute();

      if ($eli = $elim->execute() === false) {
        echo "no se borro";
        return 0;
      } else {
        echo "se borro";
        return 1;

      }
    } else {
      echo "no se encontro el producto";
      return 2;

    }
  }

  /**
   * Actualiza los datos de un producto en la tabla "producto".
   *
   * @param ProductoDTO $newproc Objeto ProductoDTO que contiene los nuevos datos del producto.
   * @return void
   */
  public function actualizar($newproc)
  {
    $sql = "UPDATE producto SET nombre_producto = ?, valor_compra = ?, valor_venta = ?, cantidad = ?, detalle_producto = ?, estado = ? WHERE codigo = ?";
    $update = $this->conexion->prepare($sql);

    $data = array(
      $newproc->getNombreProducto(),
      $newproc->getValorCompra(),
      $newproc->getValorVenta(),
      $newproc->getCantidad(),
      $newproc->getDetalleProducto(),
      $newproc->getEstado(),
      $newproc->getCodigo()
    );

    echo $sql;

    if (($upd = $update->execute($data)) === false) {
      echo "no se pudo actualizar";
    } else {

      echo "se actualizo";

    }

  }



}
?>