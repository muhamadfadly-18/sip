<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html, $filename='', $paper, $orientation, $no_batch, $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
    	$pdf = $dompdf->output();
    	$file_location = $_SERVER['DOCUMENT_ROOT']."/ijazah_v2/package_transkrip/".$no_batch."/".$filename.".pdf";
    	file_put_contents($file_location,$pdf);
    	chmod($file_location, 0777);

    	/*$dompdf->stream($filename.".pdf", array("Attachment" => 0));*/
    } else {
        return $dompdf->output();
    }
}

?>