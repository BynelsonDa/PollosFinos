<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include '../../conexion.php';//llamamos a la conexion BD

      //$consulta1 = $bd->query("SELECT * FROM aves");//traemos datos de la empresa desde BD
      //$dato_info = $consulta1->fetch_object();
      $consulta_info = $bd->query("SELECT * FROM aves"); // Fetch data from the 'aves' table
      $dato_info = $consulta_info->fetch(PDO::FETCH_OBJ); // Use PDO's fetch() method with FETCH_OBJ option

      $this->Image('gallina.png', 270, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('POLLOSFINOS'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : Los Patios"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono :32545451515"), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo :XSererfd@gmail.com "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : 256 FE "), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE ALTAS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(15, 10, utf8_decode('id'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('nombre'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('especie'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('genero'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('galpon'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('huevos'), 1, 0, 'C', 1);
      $this->Cell(65, 10, utf8_decode('fecha'), 1, 1, 'C', 1);
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
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include '../../conexion.php';
//require '../../Alta/';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
$consulta_info = $bd->query("SELECT * FROM aves");
$dato_info = $consulta_info->fetch(PDO::FETCH_OBJ);

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$consulta_reporte_asistencia = $bd->query(" SELECT * FROM aves ");

while ($datos_reporte = $consulta_reporte_asistencia->fetch(PDO::FETCH_OBJ)) {
   $i = $i + 1;
   /* TABLA */
   $pdf->Cell(15, 10, utf8_decode($datos_reporte->id), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->nombre), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->especie), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->genero), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($datos_reporte->galpon), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($datos_reporte->huevos), 1, 0, 'C', 0);
   $pdf->Cell(65, 10, utf8_decode($datos_reporte->fecha), 1, 1, 'C', 0);
}

$pdf->Output('Prueba2.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)