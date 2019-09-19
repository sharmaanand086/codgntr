<?php
require('../fpdf.php');

class PDF extends FPDF
{
		var $B;
		var $I;
		var $U;
		var $HREF;
		
		function PDF($orientation='P', $unit='mm', $size='A4')
		{
			// Call parent constructor
			$this->FPDF($orientation,$unit,$size);
			// Initialization
			$this->B = 0;
			$this->I = 0;
			$this->U = 0;
			$this->HREF = '';
		}
		
		function WriteHTML($html)
		{
			// HTML parser
			$html = str_replace("\n",' ',$html);
			$a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
			foreach($a as $i=>$e)
			{
				if($i%2==0)
				{
					// Text
					if($this->HREF)
						$this->PutLink($this->HREF,$e);
					else
						$this->Write(5,$e);
				}
				else
				{
					// Tag
					if($e[0]=='/')
						$this->CloseTag(strtoupper(substr($e,1)));
					else
					{
						// Extract attributes
						$a2 = explode(' ',$e);
						$tag = strtoupper(array_shift($a2));
						$attr = array();
						foreach($a2 as $v)
						{
							if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
								$attr[strtoupper($a3[1])] = $a3[2];
						}
						$this->OpenTag($tag,$attr);
					}
				}
			}
		}
		
		function OpenTag($tag, $attr)
		{
			// Opening tag
			if($tag=='B' || $tag=='I' || $tag=='U')
				$this->SetStyle($tag,true);
			if($tag=='A')
				$this->HREF = $attr['HREF'];
			if($tag=='BR')
				$this->Ln(5);
		}
		
		function CloseTag($tag)
		{
			// Closing tag
			if($tag=='B' || $tag=='I' || $tag=='U')
				$this->SetStyle($tag,false);
			if($tag=='A')
				$this->HREF = '';
		}
		
		function SetStyle($tag, $enable)
		{
			// Modify style and select corresponding font
			$this->$tag += ($enable ? 1 : -1);
			$style = '';
			foreach(array('B', 'I', 'U') as $s)
			{
				if($this->$s>0)
					$style .= $s;
			}
			$this->SetFont('',$style);
		}
		
		function PutLink($URL, $txt)
		{
			// Put a hyperlink
			$this->SetTextColor(0,0,255);
			$this->SetStyle('U',true);
			$this->Write(5,$txt,$URL);
			$this->SetStyle('U',false);
			$this->SetTextColor(0);
		}
}

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
 
$pdf->Output("createpdf/abc1.pdf","F");

//$pdf->Output("myfile-2.pdf","I");

//$maxlifetime = ini_get("session.gc_maxlifetime");

?>

<!--<embed src="myfile-2.pdf" width=800px height=2100px>
	-->