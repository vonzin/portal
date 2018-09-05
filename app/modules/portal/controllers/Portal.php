<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends MY_Controller {

    public $css = ['nutead'];
    public $layout = 'portal/index';
    
    public function __construct() {

        parent::__construct();
    }

    public function index() {
        $this->load->view('index');
    }

}
