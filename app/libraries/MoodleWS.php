<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MoodleWS
 *
 * Biblioteca para se conectar ao WebService do Moodle
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      NUTEAD
 * @license http://www.opensource.org/licenses/mit-license.html
 */
class MoodleWS {

    public function __construct() {
        $CI           = & get_instance();
        $CI->MoodleWS = $this;
    }

    public function enviar($funcao, $dados) {

        $params = array($dados);

        //salvarXmlEnvioInsercao($params, $funcao);

        $serverurl = URL_MOODLE . '/webservice/soap/server.php' . '?wsdl=1&wstoken=' . TOKEN;

        $xml = simplexml_load_file($serverurl);

        $xml->registerXPathNamespace('SOAP-ENV', 'ava.uepg.br');

        $faulcode = $xml->xpath('/SOAP-ENV:Envelope/SOAP-ENV:Body/SOAP-ENV:Fault/faultcode');

        if (!empty($faulcode[0])) {

            $faultcode   = (array) $faulcode[0];
            $erro[]      = $faultcode[0];
            $faultstring = $xml->xpath('/SOAP-ENV:Envelope/SOAP-ENV:Body/SOAP-ENV:Fault/faultstring');

            if (!empty($faultstring[0])) {
                $faultstring = (array) $faultstring[0];
                $erro[]      = $faultstring[0];
            }

            //salvarXmlRetornoInsercao($erro, $funcao);

            exit();
        }

        $client = new SoapClient($serverurl);

        try {
            $retorno = $client->__soapCall($funcao, array($params));
        } catch (Exception $e) {
            $erro[] = $e;
        }
        if (isset($retorno)) {
            if (is_array($retorno)) {
                //salvarXmlRetornoInsercao($retorno, $funcao);
            }
            return $retorno;
        }
        else {
            return false;
        }
    }

    public function consultar($funcao, $dados) {
        
        $params    = array('criteria' => $dados);
        
        //salvarXmlEnvioConsulta($params, $funcao);
        
        $serverurl = URL_MOODLE . '/webservice/soap/server.php' . '?wsdl=1&wstoken=' . TOKEN;
        
        $xml       = simplexml_load_file($serverurl);
        
        $xml->registerXPathNamespace('SOAP-ENV', 'ava.uepg.br');
        
        $faulcode  = $xml->xpath('/SOAP-ENV:Envelope/SOAP-ENV:Body/SOAP-ENV:Fault/faultcode');
        
        if (!empty($faulcode[0])) {
            $faultcode   = (array) $faulcode[0];
            $erro[]      = $faultcode[0];
            $faultstring = $xml->xpath('/SOAP-ENV:Envelope/SOAP-ENV:Body/SOAP-ENV:Fault/faultstring');
            
            if (!empty($faultstring[0])) {
                $faultstring = (array) $faultstring[0];
                $erro[]      = $faultstring[0];
            }
            print_r($erro);
            //salvarXmlRetornoConsulta($erro, $funcao);
            exit();
        }
        $client = new SoapClient($serverurl);
        try {
            if ($funcao == 'core_course_get_courses_by_field') {
                $retorno = $client->__soapCall($funcao, $dados);
            }
            else {
                $retorno = $client->__soapCall($funcao, array($params));
            }
        } catch (Exception $e) {
            $erro[] = $e;
            print_r($erro);
            //salvarXmlRetornoConsulta($erro, $funcao);
            exit();
        }
        if (isset($retorno)) {
            //salvarXmlRetornoConsulta($retorno, $funcao);
            return $retorno;
        }
        else {
            return false;
        }
    }

}
