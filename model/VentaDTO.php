<?php

class VentaDTO {
    private $valorVenta;
    private $fechaVenta;
    private $detalleVenta;
    private $estado;
    private $codigo;
    private $usuario;
    private $listaproductos;

    public function __construct($valorVenta, $fechaVenta, $detalleVenta, $estado, $usuario,$codigo,$listaproductos) {
        
        $this->valorVenta = $valorVenta;
        $this->fechaVenta = $fechaVenta;
        $this->detalleVenta = $detalleVenta;
        $this->estado = $estado;
        $this->codigo = $codigo;
        $this->usuario = $usuario;
        $this->listaproductos = $listaproductos;
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
    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


    public function getCodigo() {
        return $this->codigo;
    }
  
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    
    public function getListaproductos() {
        return $this->listaproductos;
    }
  
    public function setListaproductos($listaproductos) {
        $this->listaproductos = $listaproductos;
    }

}


?>