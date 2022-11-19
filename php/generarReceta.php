<?php
if( !empty($_POST) ) {
  /*
  require_once '../dbConnection/Registrar/recetas_medicas.php';
  require_once '../dbConnection/UPDATE/citas.php';
  require_once 'extraerId.php';
  $fechaIncorrecta = str_replace('/', '-', $_POST['fecha_final']);
  $fechaFormateada = date('Y-m-d', strtotime($fechaIncorrecta));
  $_POST['fecha_final'] = $fechaFormateada;
  $medicamentos = null;
  $alimentos = null;
  if( !empty($_POST['medicamentos']) ) { 
    $medicamentos = array();
    $medicamentos[0] = $_POST['medicamentos']; 
    $numMeds = count($medicamentos);
    for($i = 0; $i < $numMeds; $i ++)
    $medicamentos[$i] = (int)( extraerId($medicamentos[$i]) );
  }
  if( !empty($_POST['alimentos']) ) {
    $alimentos = array();
    $alimentos[0] = $_POST['alimentos'];
    $numAlimentos = count($alimentos);
    for($i = 0; $i < $numAlimentos; $i ++)
    $alimentos[$i] = extraerId($alimentos[$i]);
  }
  $nutriologo = 1;
  registrarReceta($nutriologo, $_POST['nombre_usuario'], $_POST['peso_inicial'],$_POST['fecha_final'], $_POST['descripcion'], $medicamentos, $alimentos);
  sitaFueAtendida($_POST['id_cita']);
  */

  // Generate PDF
  require_once  realpath(dirname(__FILE__) . '/../fpdf/fpdf.php');
  $pdf = new FPDF('L', 'mm', 'A5');
  $pdf->AddPage();
  // Header
  $pdf->SetFont('Arial','B',18);
  $pdf->Cell(0,0,'No more fat', 0, 0, 'C');
  $pdf->Ln(8);
  $pdf->SetFont('Arial','I',16);
  $pdf->Cell(0,0,'Nutriologist name', 0, 0, 'C');
  $pdf->Ln(8);
  
  // Patient and Weight
  $pdf->SetFont('Arial','',14);
  $pdf->Cell(0, 0, 'Patient: '  . $_POST['nombre_usuario']);
  $pdf->Cell(0, 0, 'Weight: '  . $_POST['peso_inicial'], 0, 0, 'R');
  $pdf->Ln(10);
  // Description
  $pdf->SetFont('Arial','',12);
  $pdf->MultiCell(0, 7, $_POST['descripcion'], 0);
  $pdf->Ln(5);
  $pdf->SetFont('Arial','I',11);
  $pdf->Cell(0, 0, 'Finish Date: '  . $_POST['fecha_final']);
  $pdf->Ln(10);
  // Meds
  $pdf->SetFont('Arial','I',14);
  $pdf->Cell(0,0,'Medicines', 0, 0, 'C');
  $pdf->Ln(6);
  $pdf->SetFont('Arial','',12);
  $pdf->MultiCell(0, 8, $_POST['medicamentos'], 1);
  $pdf->Ln(10);
  // Meals
  $pdf->SetFont('Arial','I',14);
  $pdf->Cell(0,0,'Meals', 0, 0, 'C');
  $pdf->Ln(6);
  $pdf->SetFont('Arial','',12);
  $pdf->MultiCell(0, 8, $_POST['alimentos'], 1);

  // Generate Receipt
  $pdf->AddPage('P', array(200, 80));
  //Header
  $pdf->SetFont('Arial','B',18);
  $pdf->Cell(0,0,'No more fat', 0, 0, 'C');

  $pdf->Ln(6);
  $pdf->Cell(0,0, '', 1);

  $pdf->Ln(5);
  $pdf->SetFont('Arial','I',14);
  $pdf->Cell(0,0,'Medicines', 0, 0, 'C');
  $pdf->Ln(6);
  // Meds
  $subTotales = array();
  // Print Meds
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(0, 8, $_POST['medicamentos'], 1);
  if(!empty($_POST['medicamentos'])) {
    array_push($subTotales, 80);
    $pdf->Cell(0, 8, '$' . $subTotales[0], 0, 0, 'R');
  }
  $pdf->Ln(10);
  // Total
  $pdf->SetFont('Arial','I',11);
  $total = 0;
  foreach($subTotales as $subTotal)
    $total += $subTotal;
  $pdf->Cell(0, 8, 'Total: $' . $total, 0, 0, 'R');
  $pdf->Output();
}

?>