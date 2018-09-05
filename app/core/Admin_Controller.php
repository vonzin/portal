<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->add_package_path(APPPATH . 'third_party/ion_auth/');
        $this->load->library('ion_auth');

        $module_class = $this->router->fetch_module() . '/' . $this->router->fetch_class();

        if (!$this->ion_auth->logged_in()) {
            if ($module_class !== 'admin/auth') {
                redirect('admin/auth', 'refresh');
            }
        }
        elseif (!$this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        }
    }

}
