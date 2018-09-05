<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Funcoes { //a chamada e a utilização devem ser realizadas em minusculo $this->load->library('funcoes');

    /*
     * Converte mês em inglês para Português
     * Ex. Entrada: 'April'
     * Ex. Saída: 'Abril'
     */
    public function ENtoPTBR($texto){
        $ptMeses_longo = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        $enMeses_longo = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $ptMeses_curto = array('Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');
        $enMeses_curto = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        $texto = str_replace($enMeses_longo,$ptMeses_longo,$texto);
        $texto = str_replace($enMeses_curto,$ptMeses_curto,$texto);
        return $texto;
    }

    /*
     * Recebe um CPF somente com numeros e retorna o valor com os pontos e o traço
     * Ex. Entrada: '00000000000'
     * Ex. Saída: '000.000.000-00'
     */

    public function mascaraCpf($cpfOriginal) {
        $cpf = preg_replace('#[^0-9]#', '', $cpfOriginal);
        if (strlen($cpf) == 11) {
            $cpfFinal = substr($cpf, 0, 3) . "." . substr($cpf, 3, 3) . "." . substr($cpf, 6, 3) . "-" . substr($cpf, 9, 2);
            return $cpfFinal;
        } else {
            return $cpf;
        }
    }

    /*
     * Recebe uma data no formato Y-m-d e retorna a mesma no padrão d/m/Y
     * Ex. Entrada: '2015-12-20'
     * Ex. Saída: '20/12/2015'
     */

    public function inverteData($data) {
        return date('d/m/Y', strtotime($data));
    }

    /*
     * Recebe uma string com letras, pontuação e números misturados e retorna apenas os números. Pode ser utilizado para renover pontuação de um CPF
     * Ex. Entrada: '000.00s0.000-00'
     * Ex. Saída: '00000000000'
     */

    public function somenteNumeros($str) {
        return preg_replace('#[^0-9]#', '', $str);
    }

    public function dataBR($data, $tipo = '') {
        if ($tipo != '') {
            $data = explode(' ', $data);
            $data = $data[0];
        }
        if ($data == '')
            return $data;
        $d = explode('-', $data);
        if ($d[2] != '') {
            $h = explode(' ', $d[2]);
            if (@$h[1] == '')
                return $d[2] . '/' . $d[1] . '/' . $d[0];
            else
                return $h[0] . '/' . $d[1] . '/' . $d[0] . ' ' . $h[1];
        } else
            return $data;
    }

    public function dataUS($data) {
        if ($data == '')
            return $data;
        $d = explode('/', $data);
        if ($d[2] != '')
            return $d[2] . '-' . $d[1] . '-' . $d[0];
        else
            return $data;
    }

}

?>