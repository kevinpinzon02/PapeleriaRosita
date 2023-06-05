<?php
 //namespace persistence;

require_once('ConexionBD.php');
require_once('ProductoDAO.php');
  
//use model\EmpleadoDTO;


class CompraDAO {
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
      $sql= "INSERT INTO compra values (?,?,?,?,?,?,?,?)";
      $insert=$this->conexion->prepare($sql);
      $data= array(0,
      $newventa ->getValorCompra(), 
      $newventa ->getFechaCompra(),
      $newventa ->getDetalleCompra(),
      $newventa ->getEstado(),
      $newventa ->getIdPedido(),
      $newventa ->getIdUsuario(),
      $newventa ->getCodigo());

      $idinsert = $this->conexion->lastInsertId();
      $id2 = $idinsert;
      //echo " este es el usuario: ".$newventa ->getUsuario();
      if (($inse= $insert ->execute($data)) ===false){
          echo "no se logor insertar";
        return 3;
      }else{
        $idinsert = $this->conexion->lastInsertId();
        $id2 = $idinsert;
       $this->actualizarproducto($newventa ->getListaProducto(),$id2);
      }
           
    }else {
        echo "no se pudo";
      }

   
    }
  
    public function actualizarproducto($listaproductos,$codigo){
     foreach ($listaproductos as $producto) {
        
        $id_producto = $producto['id_producto'];
        $cantidad = $producto['cantidad'];
        echo "Nombre: " . $id_producto. ", Edad: " . $cantidad . "<br>";
        $sql= "INSERT INTO compra_producto values (?,?,?)";
        $insert=$this->conexion->prepare($sql);
        $data= array($codigo,
        $id_producto,
        $cantidad);
        if (!$insert->execute($data)) {
            echo "Error al insertar en la tabla venta_producto.";
            return; 
          }

    }



    } 
   



  public function buscar ($ide){
    $consult= "SELECT * FROM compra WHERE codigo = '$ide'";
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