<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Email Queue
 *
 * A CodeIgniter library to queue e-mails.
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      Thaynã Bruno Moretti
 * @link    http://www.meau.com.br/
 * @license http://www.opensource.org/licenses/mit-license.html
 */
class MY_Email extends Email_Queue {
    
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->CI =& get_instance();
    }
    
    public function para($para) {
        $this->to($para);
    }
    
    public function assunto($assunto) {
        $this->subject($assunto);
    }
    
    public function grupo($grupo) {
        // Se grupo não é array
        if (!is_array($grupo)) {
            $grupo = func_get_args();
        }       
        
        // Lista de grupos
        $lista_grupos = $this->CI->ion_auth->groups()->result();
        foreach ($lista_grupos as $_grupo) {
            if (in_array($_grupo->name, $grupo)) {
                $ids_grupo[] = $_grupo->id;
            }
        }
        
        $users = $this->CI->ion_auth->users($ids_grupo)->result();
        
        foreach ($users as $user) {
            $emails[] = $user->email;
        }
        
        $this->to($emails);
    }
    
    public function template($view, $dados = null) {
        $this->message($this->CI->load->view($view, $dados, TRUE));
    }
    
}
