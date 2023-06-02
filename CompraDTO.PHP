<?php

    class CompraDTO{

    private $valorCompra;
    private $fechaCompra;
    private $id_pedido;
    private $detalleCompra;
    private $estado;
    private $id_usuario;

    function __construct($valorCompra,$fechaCompra,$id_pedido,$detalleCompra,$estado,$id_usuario)
    {
        $this->valorCompra = $valorCompra;
        $this->fechaCompra = $fechaCompra;
        $this->id_pedido = $id_pedido;
        $this->detalleCompra = $detalleCompra;
        $this->estado = $estado;
        $this->id_usuario = $id_usuario;
        $this->estado = $estado;
        $this->estado = $estado;
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
    public function getIdPedido() {
        return $this->id_pedido;
    }

    public function setIdPedido($id_pedido) {
        $this->id_pedido = $id_pedido;
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
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
}

?>