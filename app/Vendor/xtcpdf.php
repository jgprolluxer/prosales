<?php

App::import('Vendor', 'tcpdf/tcpdf');

class xtcpdf extends TCPDF {

//Page header

    public function Header() {
        
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 6);
        $this->Cell(190, '9', 'CRM Obelit -  Pag.' .$this->getAliasNumPage() , 0, 0, 'R', 0, '', 0, false, 'D', 'T');
        $this->SetTextColor(127);
    }

}

?>