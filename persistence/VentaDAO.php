<?php
 //namespace persistence;

require_once('ConexionBD.php');
require_once('ProductoDAO.php');
  
//use model\EmpleadoDTO;


class VentaDAO {
    private $conexion;
    private $ventadto;

function __construct() {
     
     $this->conexion =new Conexion();
     $this->conexion  =  $this->conexion ->connect();
     


    

  }


   public function insertar($newventa)
  {

    $encontrar = $this->buscar($newventa ->getCodigo());
    if($encontrar===false){
      $sql= "INSERT INTO venta values (?,?,?,?,?,?,?)";
      $insert=$this->conexion->prepare($sql);
      $data= array(0,$newventa ->getValorVenta(), 
      $newventa ->getFechaVenta(),
      $newventa ->getDetalleVenta(),
      $newventa ->getEstado(),
      $newventa ->getUsuario(),
      $newventa ->getCodigo()); 
      if (($inse= $insert ->execute($data)) ===false){
          echo "no se logor insertar";
        return 3;
      }else{
        $idinsert = $this->conexion->lastInsertId();
        $id2 = $idinsert;
        $this->actualizarPoructo($newventa ->getListaproductos(),$id2);
      }
           
    }else {
        echo "no se pudo";
      }

   
    }
  
    public function actualizarPoructo($listaproductos,$codigo){
     foreach ($listaproductos as $producto) {
      $id_producto = $producto['id_producto'];
      $cantidad = $producto['cantidad'];
      echo "Nombre: " . $id_producto. ", Edad: " . $codigo . "<br>";
      $sql= "INSERT INTO venta_producto values (?,?,?)";
      $insert=$this->conexion->prepare($sql);
      $data= array($codigo,
      $id_producto,
      $cantidad);
      if (!$insert->execute($data)) {
          echo "Error al insertar en la tabla venta_producto.";
          return; 
        }else{
          $venta=   $this->calcularSumaVenta($codigo);
        }
    }
    } 
   

    public function calcularSumaVenta($idVenta)
{
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
      $data = array($valorTotal,
      $idVenta
        
      );
  
      if (($upd = $update->execute($data)) === false) {
        echo "error";
      } else {
        echo "final feliz";
      }
    

    return $valorTotal;
}



  public function buscar ($ide){
    $consult= "SELECT * FROM venta WHERE codigo_venta = '$ide'";
    $result2 =$this->conexion->query($consult);
    $ersut= $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut)!=null){
      return true;
    }else {
      return false;
    }

  }

    public function eliminar($ide) {
     
}

public function actualizar($newproc) {
  

}



public function getEmpleadodto() {
  return $this->empleadodto;
}

public function setEmpleadodto($empleadodto) {
  $this->empleadodto = $empleadodto;
}


}
  ?>