<?php 
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header('Content-Type: application/vnd.ms-excel; charset=utf-8'); 
header('Content-Disposition: attachment;filename="Reporte.xls"');
echo $content_for_layout; 
?>