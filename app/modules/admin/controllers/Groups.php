<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }

    //redirect if needed, otherwise display the user list
    function index() {
        echo $this->router->fetch_module() . '/' . $this->router->fetch_class();
    }

}
