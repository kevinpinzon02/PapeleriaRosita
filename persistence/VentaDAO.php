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

      $idinsert = $this->conexion->lastInsertId();
      $id2 = $idinsert;
      echo " este es el usuario: ".$newventa ->getUsuario();

      
 

      if (($inse= $insert ->execute($data)) ===false){
          echo "no se logor insertar";
        return 3;
      }else{
        //$this->actualizarPoructo($newventa ->getListaproductos(),$id2);
      }
           
    }else {
        echo "no se pudo";
      }

   
    }
  
    public function actualizarPoructo($listaproductos,$codgio){
     foreach ($listaproductos as $producto) {
        echo "Nombre: " . $producto->getNombreProducto() . ", Edad: " . $producto->getCantidad() . "<br>";
        $sql= "INSERT INTO venta_producto values (?,?,?)";
        $insert=$this->conexion->prepare($sql);
        $data= array($codgio,
        $producto ->getCodigo(),
        $producto ->getCantidad());
  
       
        echo " este es el usuario: ". $producto ->getCodigo();
    }



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
      $encontrar = $this->buscar($ide);
      $encontrar = $this->buscar($ide);

      if($encontrar===true){
      $eliminarproducto = "DELETE FROM producto WHERE nombre_producto = '$ide'";
      $elim = $this->conexion->prepare($eliminarproducto);
      $eli = $elim->execute();

      if($eli = $elim->execute()===false){
      echo "no se borro";
      return 0;
  }else {
    echo "se borro";
    return 1;

  }
}else{
  echo "no se encontro el producto";
  return 2;

}
}

public function actualizar($newproc) {
  $sql = "UPDATE producto SET nombre_producto = ?, valor_compra = ?, valor_venta = ?, cantidad = ?, detalle_producto = ?, estado = ? WHERE codigo = ?";
  $update = $this->conexion->prepare($sql);
  
  $data= array($newproc ->getNombreProducto(), 
  $newproc ->getValorCompra(),
  $newproc ->getValorVenta(),
  $newproc ->getCantidad(),
  $newproc ->getDetalleProducto(),
  $newproc ->getEstado(),
  $newproc ->getCodigo());

  echo  $sql;

  if (($upd = $update->execute($data)) === false) {
      echo "no se pudo actualizar";
  }else{

    echo "se actualizo";
     
  }

}



public function getEmpleadodto() {
  return $this->empleadodto;
}

public function setEmpleadodto($empleadodto) {
  $this->empleadodto = $empleadodto;
}


}
  ?>