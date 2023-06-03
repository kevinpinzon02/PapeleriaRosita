<?php

class PedidoDTO {
    private $codigo;
    private $fechaRealizacion;
    private $fechaEsperada;
    private $detallePedido;
    private $estado;
    private $id_proveedor;

    public function __construct($codigo,$fechaRealizacion, $fechaEsperada, $detallePedido, $estado, $id_proveedor) {
        $this->codigo = $codigo;
        $this->fechaRealizacion = $fechaRealizacion;
        $this->fechaEsperada = $fechaEsperada;
        $this->detallePedido = $detallePedido;
        $this->estado = $estado;
        $this->id_proveedor = $id_proveedor;
    }
//
    public function getCodigo() {
        return $this->codigo;
    }
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
//   
    public function getFechaRealizacion() {
        return $this->fechaRealizacion;
    }
    public function setFechaRealizacion($fechaRealizacion) {
        $this->fechaRealizacion = $fechaRealizacion;
    }
//    
    public function getFechaEsperada() {
        return $this->fechaEsperada;
    }

    public function setFechaEsperada($fechaEsperada) {
        $this->fechaEsperada = $fechaEsperada;
    }
//    
    public function getIdProveedor() {
        return $this->id_proveedor;
    }

    public function setIdProveedor($id_proveedor) {
        $this->id_proveedor = $id_proveedor;
    }
//
    public function getDetallePedido() {
        return $this->detallePedido;
    }
    
    public function setDetallePedido($detallePedido) {
        $this->detallePedido = $detallePedido;
    }
//
    public function getEstado() {
        return $this->estado;
    }
   
    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>