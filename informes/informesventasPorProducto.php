<?php

require_once('../fpdf/fpdf.php');
require('../persistence/conexion.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {

      $this->Image('https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/Logo_de_la_Universidad_El_Bosque.svg/1200px-Logo_de_la_Universidad_El_Bosque.svg.png', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Papeleria Rosita'), 1, 1, 'C', 0);
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE VENTAS POR VENDEDOR"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);

      $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('VALOR VENTA'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('FECHA'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('ESTADO'), 1, 0, 'C', 1);
      $this->Cell(45, 10, utf8_decode('NOMBRE PRODUCTO'), 1, 0, 'C', 1);
      $this->Cell(45, 10, utf8_decode('NOMBRE VENDEDOR'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('DETALLES'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $mysqli->query(" select *from usuario ");
//$dato_info = $consulta_info->fetch_object();

function crear($IDproducto)
{
   require_once('conexion.php');
   $pdf = new PDF();
   $pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
   $pdf->AliasNbPages(); //muestra la pagina / y total de paginas

   $i = 0;
   $pdf->SetFont('Arial', '', 10);
   $pdf->SetDrawColor(163, 163, 163); //colorBorde
   $IDproducto = 4;

   $consulta_reporte_alquiler = $conexion->query("SELECT venta.id_venta,venta.valor_venta , venta.fecha_venta ,venta.detalle_venta ,venta.estado , producto.nombre_producto AS nombre_producto, usuario.nombre AS nombre_usuario
FROM venta
JOIN venta_producto ON venta.id_venta = venta_producto.id_venta
JOIN producto ON venta_producto.id_producto = producto.id_producto
JOIN usuario ON venta.id_usuario = usuario.id_usuario
WHERE venta_producto.id_producto = $IDproducto;");


   while ($row = $consulta_reporte_alquiler->fetch_assoc()) {
      $texto = $row['detalle_venta'];
      $texto2 = strlen($texto);
      if ($texto2 > 55) {
         $alto2 = 5;
         $alto = 10;
      } else {
         $alto2 = 5;
         $alto = 5;
      }
      $i = $i + 1;
      /* TABLA */
      $pdf->Cell(10, $alto, $row['id_venta'], 1, 0, 'C', 0);
      $pdf->Cell(30, $alto, $row['valor_venta'], 1, 0, 'C', 0);
      $pdf->Cell(25, $alto, $row['fecha_venta'], 1, 0, 'C', 0);
      $pdf->Cell(20, $alto, $row['estado'], 1, 0, 'C', 0);
      $pdf->Cell(45, $alto, $row['nombre_producto'], 1, 0, 'C', 0);
      $pdf->Cell(45, $alto, $row['nombre_usuario'], 1, 0, 'C', 0);
      $pdf->Cell(50, $alto, $row['detalle_venta'], 1, 1, 'C', 0);
   }
   $pdf->Output();
}
?>