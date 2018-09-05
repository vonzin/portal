<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ViaCEP - Biblioteca para CodeIgniter
 * 
 * Tem como objetivo criar um meio para consultar o WebService
 * do ViaCEP e ao mesmo tempo armazenar os dados consultados
 * em uma tabela.
 *
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html
 * @author Pablo Alexander da Rocha Gonçalves E NUTEAD
 * @link http://www.parg.com.br/
 * @link https://github.com/parg-programador
 */
class Viacep {

    public $CI;
    private $tabela = 'api_cep'; // nome da tabela
    private $erros  = [];
    private $registro; // quando for encontrado um CEP válido no banco de dados

    /**
     * Constrói a classe
     * 
     * @param string $cep Define o cep que vai ser consultado
     */

    public function __construct() {
        $CI         = & get_instance();
        $CI->Viacep = $this;
        $this->CI   = $CI;

        $this->cep = null;

        // verifica o a biblioteca database
        if (!$this->CI->load->is_loaded('database')) {
            $this->CI->load->database();
        }

        // verifica se a tabela existe
        if (!$this->CI->db->table_exists($this->tabela)) {
            $this->verificaCriaTabela();
        }
    }

    /**
     * Procedimento para consultar um CEP
     * 
     * @param string $cep
     * @return bool retorna true caso encontre o CEP
     */
    public function consultar($cep) {

        // Alocar cep em variavel da classe
        $this->cep = $cep;

        // Se cep não é uma string, erro
        if (!is_string($this->cep)) {
            $this->erros[] = "Favor informar um CEP!";
        }

        // Se cep não possui formatação 00000-000
        if (!preg_match('/[0-9]{5}-[0-9]{3}/', $this->cep)) {
            $this->erros[] = "O CEP {$this->cep} não é válido!";
            return;
        }

        // se cep existe na base local
        if ($this->cepExiste()) {
            return $this->registro;
        }

        // consultar no ws
        if ($this->buscarCEP()) {
            $this->salvaRegistro();
            return $this->registro;
        }
        else {
            $this->erros[] = "Não foi possível obter o endereço do CEP $cep!";
        }

        return false;
    }

    /**
     * Retorna um array contendo a lista de erros
     * 
     * @return array
     */
    public function getErros() {
        return $this->erros;
    }

    /**
     * Retorna um erro especifico
     * 
     * @param int $index
     * @return string
     */
    public function getErro($index) {
        if ((count($this->erros) - 1) <= $index) {
            return $this->erros[$index];
        }
    }

    /**
     * Retorna o ultimo erro ocorrido
     * 
     * @return string
     */
    public function getUltimoErro() {
        if (count($this->erros) > 0) {
            return $this->erros[count($this->erros) - 1];
        }
    }

    /**
     * Verifica se o CEP está cadastrado no banco de dados
     * @return boolean
     */
    private function cepExiste() {
        
        // consultar
        $data = $this->CI->db->get_where($this->tabela, ['cep' => $this->cep])->row();

        if (!$data) {
            return false;
        }
        
        $this->registro = $data;
        return true;        
    }

    /**
     * Obtem o registro do webservice do ViaCEP
     * @return boolean
     */
    private function buscarCEP() {
        $url = "http://viacep.com.br/ws/{$this->cep}/json/";

        // abre a conexão
        $ch  = curl_init();
        $out = fopen('php://output', 'w');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_STDERR, $out);

        // executa a request
        $json = curl_exec($ch);
        fclose($out);
        curl_close($ch);
        
        $resultado = json_decode($json);
        
        if (!isset($resultado->erro) && isset($resultado->cep)) {
            unset($resultado->unidade);
            $this->registro = $resultado;
            return true;
        }
        return false;
    }

    /**
     * Procedimento para salvar o registro na base de dados
     */
    private function salvaRegistro() {
        if ($this->CI->db->insert($this->tabela, $this->registro)) {
            $this->registro->id = $this->CI->db->insert_id();
        }
    }

    /**
     * Procedimento para verificar e criar a tabela CEP
     */
    private function verificaCriaTabela() {
        // carrega o db forge
        $this->CI->load->dbforge();

        // define os campos
        $campos = [
            'cep'         => [
                'type'       => 'VARCHAR',
                'constraint' => 9,
                'unique'     => true
            ],
            'logradouro'  => [
                'type'       => 'VARCHAR',
                'constraint' => 250
            ],
            'complemento' => [
                'type'       => 'VARCHAR',
                'constraint' => 50
            ],
            'bairro'      => [
                'type'       => 'VARCHAR',
                'constraint' => 150
            ],
            'localidade'  => [
                'type'       => 'VARCHAR',
                'constraint' => 100
            ],
            'uf'          => [
                'type'       => 'VARCHAR',
                'constraint' => 2
            ],
            'ibge'        => [
                'type'       => 'VARCHAR',
                'constraint' => 10
            ],
            'gia'         => [
                'type'       => 'VARCHAR',
                'constraint' => 10
            ],
            'criado_em TIMESTAMP DEFAULT NOW()'
        ];

        // define o campo id
        $this->CI->dbforge->add_field('id');

        // gera os outros campos
        $this->CI->dbforge->add_field($campos);

        // cria a tabela se ela não existe
        $this->CI->dbforge->create_table($this->tabela, true);
    }

}
