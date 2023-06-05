<?php
 //namespace persistence;

require_once('ConexionBD.php');
require_once('ProductoDAO.php');
  
//use model\EmpleadoDTO;

/**
 * Clase VentaDAO
 *
 * Esta clase se encarga de realizar operaciones relacionadas con la venta en la base de datos.
 */
class VentaDAO {
    private $conexion;
    private $ventadto;
/**
     * Constructor de la clase VentaDAO.
     * Establece la conexión con la base de datos.
     */
function __construct() {
     
     $this->conexion =new Conexion();
     $this->conexion  =  $this->conexion ->connect();
     


    

  }

/**
     * Inserta una nueva venta en la base de datos.
     *
     * @param VentaDTO $newventa Objeto de tipo VentaDTO que representa la venta a insertar.
     * @return int Retorna el resultado de la operación (0: no se logró insertar, 1: se insertó correctamente, 2: no se pudo encontrar la venta, 3: error en la ejecución del insert).
     */
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
  /**
     * Actualiza los productos asociados a una venta.
     *
     * @param array $listaproductos Array de objetos de tipo ProductoDTO que representa los productos a actualizar.
     * @param int $codgio Código de la venta.
     */
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
   


/**
     * Busca una venta en la base de datos por su código.
     *
     * @param int $ide Código de la venta a buscar.
     * @return bool Retorna true si se encontró la venta, false si no se encontró.
     */
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
/**
     * Elimina una venta de la base de datos.
     *
     * @param int $ide Código de la venta a eliminar.
     * @return int Retorna el resultado de la operación (0: no se pudo borrar, 1: se borró correctamente, 2: no se encontró la venta).
     */
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

    /**
     * Actualiza los datos de un producto en la base de datos.
     *
     * @param ProductoDTO $newproc Objeto de tipo ProductoDTO que representa el producto a actualizar.
     */
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

}
  ?>