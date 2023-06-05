<?php

    class CompraDTO{

    private $valorCompra;
    private $fechaCompra;
    private $pedido;
    private $detalleCompra;
    private $estado;
    private $usuario;
    private $listarproducto;

    private $codigo;

    function __construct($valorCompra,$fechaCompra,$pedido,$detalleCompra,$estado,$usuario,$codigo,$listarproducto)
    {
        $this->valorCompra = $valorCompra;
        $this->fechaCompra = $fechaCompra;
        $this->pedido = $pedido;
        $this->detalleCompra = $detalleCompra;
        $this->estado = $estado;
        $this->usuario = $usuario;
        $this->codigo = $codigo;
        $this->listarproducto = $listarproducto;
    }
//
    public function getValorCompra() {
        return $this->valorCompra;
    }

    public function setValorCompra($valorCompra) {
        $this->valorCompra = $valorCompra;
    }
//
    public function getFechaCompra() {
        return $this->fechaCompra;
    }

    public function setFechaCompra($fechaCompra) {
        $this->fechaCompra = $fechaCompra;
    }
//
    public function getPedido() {
        return $this->pedido;
    }

    public function setPedido($pedido) {
        $this->pedido = $pedido;
    }
    
//
    public function getDetalleCompra() {
        return $this->detalleCompra;
    }

    public function setDetalleCompra($detalleCompra) {
        $this->detalleCompra = $detalleCompra;
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

    public function getListarproducto() {
        return $this->listarproducto;
    }

    public function setListarproducto($listarproducto) {
        $this->listarproducto = $listarproducto;
    }
}

?>