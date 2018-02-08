<?php
    require '../fpdf/fpdf.php';
    include 'functions/demographicsFunction.php';
    include 'functions/retrieveEvacuationCenterFunction.php';
    include 'functions/reliefDistributionFunction.php';

    if(isset($_GET["time"])) {
        $time = $_GET["time"];
    } else {
        $time = "showAll";
    }


    if (isset($_GET['evac_id'])) {
        $evac_id = $_GET['evac_id'];
        $myrow = $obj->retrieveEvacuationCenter3($evac_id);
        foreach ($myrow as $row) {
            $location_name = $row['location_name'];
            $street = $row['street'];
            $barangay = $row['brgy_name'];
            $city = $row['city'];
            $province = $row['province'];
        }
    }


    $pdf = new FPDF('P','mm',array(215.9,279.4));

    $pdf->AddPage();
    $pdf->SetFont("Arial","B","16");
    $pdf->Cell(0,10,"EVACUATION CENTER REPORT",0,1,"C");
    
    $pdf->SetFont("Arial","B","12");
    $pdf->Cell(40,10,"Evacuation Center:",0,0,"L");
    $pdf->SetFont("Arial","","12");
    $pdf->Cell(80,10,$location_name,0,0,"L");

    $pdf->SetFont("Arial","B","12");
    $pdf->Cell(40,10,"City/Municipality:",0,0,"L");
    $pdf->SetFont("Arial","","12");
    $pdf->Cell(0,10,$city,0,1,"L");
    
    $pdf->SetFont("Arial","B","12");
    $pdf->Cell(40,3,"Street:",0,0,"L");
    $pdf->SetFont("Arial","","12");
    $pdf->Cell(80,3,$street,0,0,"L");

    $pdf->SetFont("Arial","B","12");
    $pdf->Cell(40,3,"Province:",0,0,"L");
    $pdf->SetFont("Arial","","12");
    $pdf->Cell(0,3,$province,0,1,"L");

    $pdf->SetFont("Arial","B","12");
    $pdf->Cell(40,10,"Barangay:",0,0,"L");
    $pdf->SetFont("Arial","","12");
    $pdf->Cell(0,10,$barangay,0,1,"L");

    $pdf->SetFont("Arial","B","12");
    $pdf->Cell(60,20,"No. of Evacuees:",0,0,"L");
    $pdf->SetFont("Arial","","12");
    $pdf->Cell(0,20,$total = $demog->retrieveNumberOfEvacueesInSpecificEvac($evac_id, $time),0,1,"L");

    $pdf->SetFont("Arial","B","12");
    $pdf->Cell(60,0,"No. of Families Evacuated:",0,0,"L");
    $pdf->SetFont("Arial","","12");
    $pdf->Cell(0,0,$total = $demog->retrieveNumberOfFamiliesEvacuated($evac_id, $time),0,1,"L");

    $pdf->SetFont("Arial","B","12");
    $pdf->Cell(60,20,"No. of Female Evacuees:",0,0,"L");
    $pdf->SetFont("Arial","","12");
    $pdf->Cell(0,20,$total = $demog->retrieveNumberOfFemaleEvacueesInSpecificEvac($evac_id, $time),0,1,"L");

    $pdf->SetFont("Arial","B","12");
    $pdf->Cell(60,0,"No. of Male Evacuees:",0,0,"L");
    $pdf->SetFont("Arial","","12");
    $pdf->Cell(0,0,$total = $demog->retrieveNumberOfMaleEvacueesInSpecificEvac($evac_id, $time),0,1,"L");


    //Table for Package Distribution
    $pdf->SetY(100);
    $pdf->SetFont("Arial","B","14");
    $pdf->Cell(47,10,"Package Distribution",0,1,"L");

    $pdf->SetFont("Arial","B","12");
    $w = 195/4;
    $pdf->Cell($w,7,"Package Name",0,0,"L");
    $pdf->Cell($w,7,"Date Received",0,0,"L");
    $pdf->Cell($w,7,"Relief Operation",0,0,"L");
    $pdf->Cell($w,7,"No. of Families",0,1,"L");

    $myrow = $dist->retrieveDistributionList($evac_id, $time);
    foreach ($myrow as $row) {
        $pdf->SetFont("Arial","","12");
        $pdf->Cell($w,7,$row['package_name'],0,0,"L");
        $pdf->Cell($w,7,date_format(new DateTime($row['date_dist']), 'M d Y'),0,0,"L");
        $pdf->Cell($w,7, $row['operation_name'],0,0,"L");
        $pdf->Cell($w,7,$row['householdnumber'],0,1,"L");
    }

    //Table for Health Status
    $pdf->SetY(135);
    $pdf->SetFont("Arial","B","14");
    $pdf->Cell(47,10,"Health Status",0,1,"L");

    $pdf->SetFont("Arial","B","12");
    $pdf->Cell($w,7,"Diseases",0,0,"L");
    $pdf->Cell($w,7,"Infected",0,1,"L");

    $myrow = $demog->retrieveNumberOfInfected($evac_id, $time);
    foreach ($myrow as $row) {
        $pdf->SetFont("Arial","","12");
        $pdf->Cell($w,7,$row['disease_name'],0,0,"L");
        $pdf->Cell($w,7,$row['infected'],0,1,"L");
    }

    $pdf->Output();

?>