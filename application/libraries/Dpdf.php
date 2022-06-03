<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter PDF Library
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Muhanz
 * @license         MIT License
 * @link            https://github.com/hanzzame/ci3-pdf-generator-library
 *
 */
use DompdfAdapterCPDF;
use DompdfDompdf;
use DompdfException;
require_once APPPATH.'libraries/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
class Dpdf
{
    public function create($html,$filename)
    {
        ini_set('memory_limit','-1');
        ini_set ( 'max_execution_time', -1);
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $options->set('isRemoteEnabled',true);
        $options->set('debugKeepTemp', TRUE);
        $options->set('setTempDir',FCPATH.'test/');
        $dompdf = new Dompdf($options);
        $context = stream_context_create([ 
            'ssl' => [ 
                'verify_peer' => FALSE, 
                'verify_peer_name' => FALSE,
                'allow_self_signed'=> TRUE 
            ] 
        ]);
        $dompdf->set_paper("A4", "portrait");
        $dompdf->setHttpContext($context);
        $dompdf->set_option('enable_html5_parser', TRUE);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        return $output;
  }

    public function create_2($html,$filename)
    { 
        ob_get_clean();
        $options = new Options();
        $options->set('debugPng', true);
        $options->set('isRemoteEnabled',true);
        $options->set('debugKeepTemp', TRUE);
        $options->set('setTempDir',FCPATH.'test/');
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $context = stream_context_create([ 
            'ssl' => [ 
                'verify_peer' => FALSE, 
                'verify_peer_name' => FALSE,
                'allow_self_signed'=>TRUE, 
            ] 
        ]);
        $dompdf->set_paper("A4", "portrait");
        $dompdf->setHttpContext($context);
        $dompdf->loadHtml($html);
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->set_option('enable_html5_parser', TRUE);
        $dompdf->render();
        $dompdf->stream($filename.'.pdf',array("Attachment" =>0));
    }
}