<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf_2 extends TCPDF { 
    function __construct() { 
        parent::__construct(); 
    }
    public function Footer() {
        $this->SetY(-20);
        $this->SetFont('helvetica', '', 10);
        $footertext='<p style="border-top:2px solid #ddd;text-align:center;><br><b style="color:#110d35;">Committi Inc.</b>
             200E - 141 Brunel Road,
             Mississauga, ON L4Z 1X3,
             CANADA.
             Phone   : 1-866-266-6480
             Email   : info@committi.com
             Website : <a href="www.committi.com">www.committi.com</a></p> ddd';
    
        $this->writeHTML($footertext, false, true, false, true);
        $this->Cell(0, 12, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');   
    }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */