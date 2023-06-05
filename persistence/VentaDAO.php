<?php
//namespace persistence;

require_once('ConexionBD.php');


//use model\EmpleadoDTO;


class VentaDAO
{
  private $conexion;
  private $ventadto;

  function __construct()
  {

    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();





  }


  public function insertar($newventa)
  {

    $encontrar = $this->buscar($newventa->getCodigo());
    $id2 = 0;
    if ($encontrar === false) {
      $sql = "INSERT INTO venta values (?,?,?,?,?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $data = array(
        0, $newventa->getValorVenta(),
        $newventa->getFechaVenta(),
        $newventa->getDetalleVenta(),
        $newventa->getEstado(),
        $newventa->getUsuario(),
        $newventa->getCodigo()
      );



      if (($inse = $insert->execute($data)) === true) {
        $idinsert = $this->conexion->lastInsertId();
        $id2 = $idinsert;
        echo " este es el usuario: " . $newventa->getUsuario();

        echo "el id ultimo" . $id2;
        $usu = $this->actualizarProducto($newventa->getListaproductos(), $id2);

        return 3;
      } else {

      }

    } else {
      echo "no se pudo";
    }


  }

  public function actualizarProducto($listaproductos, $codgio)
  {
    $sql = "INSERT INTO venta_producto values (?,?,?)";
    $insert = $this->conexion->prepare($sql);

    foreach ($listaproductos as $producto) {
      echo " id-venta: " . $codgio . " codigo: " . $producto->getCodigo() . ", Cantidad: " . $producto->getCantidad() . "<br>";
      $data = array(
        $codgio,
        $producto->getCodigo(),
        $producto->getCantidad()
      );
      $insert->execute($data);
    }
    $usu1 = $this->calcularSumaVenta($codgio);
    echo "Este es el código: " . $codgio;
    return 0;
  }



  public function calcularSumaVenta($idVenta)
  {
    try {
      //code...
  
      $sql = "SELECT v.id_venta, SUM(p.valor_venta * vp.cantidad) AS valor_total
            FROM venta_producto vp
            JOIN producto p ON vp.id_producto = p.id_producto
            JOIN venta v ON vp.id_venta = v.id_venta
            WHERE v.id_venta = :idVenta";

      $stmt = $this->conexion->prepare($sql);
      $stmt->bindParam(':idVenta', $idVenta, PDO::PARAM_INT);
      $stmt->execute();

      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $valorTotal = $result['valor_total'];

      $sql = "UPDATE venta SET valor_venta = ? WHERE id_venta = ?";
      $update = $this->conexion->prepare($sql);
      $data = array($valorTotal,$idVenta);

      echo $sql;

      if (($upd = $update->execute($data)) === false) {
        echo "no se pudo actualizar";
      } else {

        echo "se actualizo";

      }
  
     
    }catch (Exception $e) {
      return 0;
    }

    return $valorTotal;
  }



  public function buscar($ide)
  {
    $consult = "SELECT * FROM venta WHERE codigo_venta = '$ide'";
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
      $eliminartelefeno = "DELETE FROM venta_producto WHERE id_venta IN (SELECT id_venta FROM venta WHERE codigo_venta = $ide)";
      $elim = $this->conexion->prepare($eliminartelefeno);
      $eli = $elim->execute();

      if ($eli = $elim->execute() === false) {
        return 3;
      } else {

        $eliminarusuario = "DELETE FROM venta WHERE codigo_venta = $ide";
        $elim = $this->conexion->prepare($eliminarusuario);
        $eli = $elim->execute();
        return 1;

      }
    } else {
      return 2;

    }
  }

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