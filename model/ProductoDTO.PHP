<?php


class ProductoDTO {
    private $nombreProducto;
    private $valorCompra;
    private $valorVenta;
    private $cantidad;
    private $detalleProducto;
    private $estado;
    private $codgio;

    public function __construct($nombreProducto, $valorCompra, $valorVenta, $cantidad, $detalleProducto, $estado,$codgio) {
        
        $this->nombreProducto = $nombreProducto;
        $this->valorCompra = $valorCompra;
        $this->valorVenta = $valorVenta;
        $this->cantidad = $cantidad;
        $this->detalleProducto = $detalleProducto;
        $this->estado = $estado;
        $this->codgio = $codgio;
    }
//
    public function getNombreProducto() {
        return $this->nombreProducto;
    }

    public function setNombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }
//
    public function getValorCompra() {
        return $this->valorCompra;
    }

    public function setValorCompra($valorCompra) {
        $this->valorCompra = $valorCompra;
    }
//
    public function getValorVenta() {
        return $this->valorVenta;
    }

    public function setValorVenta($valorVenta) {
        $this->valorVenta = $valorVenta;
    }
//
    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
//
    public function getDetalleProducto() {
        return $this->detalleProducto;
    }

    public function setDetalleProducto($detalleProducto) {
        $this->detalleProducto = $detalleProducto;
    }
//
    public function getEstado() {
        return $this->estado;
    }
  
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getCodigo() {
        return $this->codgio;
    }
  
    public function setCodigo($codgio) {
        $this->codgio = $codgio;
    }
}


?>