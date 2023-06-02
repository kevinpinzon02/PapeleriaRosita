<?php

class VentaDTO {
    private $valorVenta;
    private $fechaVenta;
    private $detalleVenta;
    private $estado;
    private $id_usuario;

    public function __construct($valorVenta, $fechaVenta, $detalleVenta, $estado, $id_usuario) {
        
        $this->valorVenta = $valorVenta;
        $this->fechaVenta = $fechaVenta;
        $this->detalleVenta = $detalleVenta;
        $this->estado = $estado;
        $this->id_usuario = $id_usuario;
    }
//
    public function getValorVenta() {
        return $this->valorVenta;
    }

    public function setValorVenta($valorVenta) {
        $this->valorVenta = $valorVenta;
    }
//
    public function getFechaVenta() {
        return $this->fechaVenta;
    }

    public function setFechaVenta($fechaVenta) {
        $this->fechaVenta = $fechaVenta;
    }
//
    public function getDetalleVenta() {
        return $this->detalleVenta;
    }

    public function setDetalleVenta($detalleVenta) {
        $this->detalleVenta = $detalleVenta;
    }
//
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
//
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}


?>