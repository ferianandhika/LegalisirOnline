<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class m_pdf {
    
    function m_pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($param=NULL)
    {
        include_once APPPATH.'../application/third_party/mpdf/mpdf.php';
         
        if ($params == NULL)
        {
            $param = "'c', 'A4', '', '', 15, 15, 16, 16, 9, 9, 'P'";          		
        }
         
        return new mPDF($param);
        // return new mPDF();
    }
}