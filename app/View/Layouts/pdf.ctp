<?php 
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header('Content-Type: applications/vnd.pdf'); 
header('Content-Disposition: attachment;filename="Reporte.pdf"');
echo $content_for_layout; 
?>