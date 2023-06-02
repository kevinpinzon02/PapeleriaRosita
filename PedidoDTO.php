<?php

class PedidoDTO {
    private $fechaRealizacion;
    private $fechaEsperada;
    private $id_pedido;
    private $detallePedido;
    private $estado;

    public function __construct($fechaRealizacion, $fechaEsperada, $id_pedido, $detallePedido, $estado) {
        $this->fechaRealizacion = $fechaRealizacion;
        $this->fechaEsperada = $fechaEsperada;
        $this->id_pedido = $id_pedido;
        $this->detallePedido = $detallePedido;
        $this->estado = $estado;
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
    public function getIdPedido() {
        return $this->id_pedido;
    }

    public function setIdPedido($id_pedido) {
        $this->id_pedido = $id_pedido;
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