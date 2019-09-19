<?php

require('my_fpdf.php');

$html = "	Name	:	<b>mobin</b> <br><br>	Email	:	<b>mobin.t3office@gmail.com</b><br><br>	Questionnaire Title	:	<b>Call of Destiny</b><br><br>";

$result = " <b>Result : </b><br><br><br><b> 1 : Love / Connection Mark : 120 </b><br><br><b> 2 : Growth Mark : 100 </b><br><br> 3 : Contribution Mark : 80 <br><br> 4 : Centainty Mark : 70 <br><br> 5 : Variety / Uncertainty Mark : 60 <br><br> 6 : Significance Mark : 0 <br>";

$pdf = new PDF();
// First page
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
//$pdf->Image('images/logo.jpg',10,12,30,0,'JPG','');
$pdf->Image('images/logo.jpg',10,12,190,50,'JPG','');
//$pdf->Write(5,"testing 2 To find out what's new in this tutorial, click ");

// Line break
$pdf->Ln(70);
$pdf->WriteHTML($html);   

// Line break
$pdf->Ln(10);
$pdf->WriteHTML($result); 
$pdf->SetFont('','U');
$link = $pdf->AddLink();
//$pdf->Write(5,'here',$link);
$pdf->SetFont('');

// Second page
/*$pdf->AddPage();
$pdf->SetLink($link);
//$pdf->Image('images/logo.png',10,12,30,0,'','');
$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->WriteHTML($html);
*/

/*
 * I: send the file inline to the browser. The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
   D: send to the browser and force a file download with the name given by name.
   F: save to a local file with the name given by name (may include a path).
   S: return the document as a string. name is ignored.
 */
 
$pdf->Output("createpdf/abc4.pdf","F");

//$pdf->Output("myfile-2.pdf","I");

//$maxlifetime = ini_get("session.gc_maxlifetime");

?>

<!--<embed src="myfile-2.pdf" width=800px height=2100px>
	-->