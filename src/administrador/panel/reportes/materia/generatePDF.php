<?php
    if(isset($_POST)){
        
        $materia = $_POST["materia"];
        require "./src/pdf/fpdf.php";

        class myPDF extends FPDF{
            function header(){
                global $nombreA;
                global $materiaA;
                // $this->Image('./images/logoescom.png',1,6);
                $this->SetFont('Arial','',22);
                $this->Cell(276,5,"INSTITUTO POLITECNICO NACIONAL",0,0,'C');
                $this->Ln();
                $this->Ln();
                $this->SetFont('Arial','',16);
                $this->Cell(276,10,'ESCUELA SUPERIOR DE COMPUTO',0,0,'C');
                $this->Ln();
                $this->Ln();
                $this->SetFont('Arial','U',16);
                $this->Cell(276,5,"REPORTE DE ALUMNOS INSCRITOS A UNA MATERIA",0,0,'C');
                $this->Ln();
                $this->Ln();
                $this->Ln();
                $this->Ln();
                $this->Cell(276,5,$materiaA,0,0,'C');
                $this->SetFont('Arial','B',14);
            }
            function body(){
                global $salonA;
                global $fechaA;
                global $horarioA;
                $this->SetFont('Arial','B',14);
                $this->Ln();
                $this->Ln();
                $this->Cell(276,10,'Salon: '.$salonA,0,0,'C');
                $this->Ln();
                $this->Ln();
                $this->Cell(276,10,'Fecha: '.$fechaA,0,0,'C');
                $this->Ln();
                $this->Ln();
                $this->Cell(276,10,'Hora: '.$horarioA,0,0,'C');
            }   
            function footer(){
                $this->SetY(-15);
                $this->SetFont('Arial','',8);
                $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }
 
        $pdf = new myPDF();
        $materiaA = $materia;
        $nombreA = "Jesus";
        $salonA = "11010";
        $horarioA = "sfsd";
        $fechaA = "10/8/12";
        $pdf->AliasNbPages();
        $pdf->AddPage('L','A4',0);
        $pdf->body();
        $pdf->Output('F', './reportes/reporte_calculo.pdf');
    }
?>