<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Login_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->add_package_path(APPPATH . 'third_party/ion_auth/');
        $this->load->library('ion_auth');

        if (!$this->ion_auth->logged_in()) {
            if ($this->router->fetch_module() !== 'admin' && $this->router->fetch_class() !== 'auth') {
                redirect('admin/auth', 'refresh');
            }
        }
    }

}
