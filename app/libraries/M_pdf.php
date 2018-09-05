<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pdf {

    function m_pdf() {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    function load($param = NULL) {
        include_once APPPATH . '/third_party/mpdf/Mpdf.php';

        if ($params == NULL) {
            $param = '"pt-BR-x","A4-L","","",10,10,10,10,6,3,"L"';
        }

        return new mPDF($param);
    }

}
