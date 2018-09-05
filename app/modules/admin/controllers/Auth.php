<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->layout = null;
    }

    public function index() {
        $dados['title'] = "Login";
        //validate form input
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() == true) {
            //check to see if the user is logging in
            //check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('/admin', 'refresh');
            }
            else {
                //if the login was un-successful
                //redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('admin/auth', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        }
        else {
            //the user is not logging in so display the login page
            //set the flash data error message if there is one
            $dados['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            
            $dados['identity'] = array('name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $dados['password'] = array('name' => 'password',
                'id'   => 'password',
                'type' => 'password',
            );

            $this->load->view('auth/login', $dados);
        }
    }

    //log the user out
    public function logout() {
        $this->ion_auth->logout();
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('admin/auth', 'refresh');
    }

    //forgot password
    public function forgot_password() {
        $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        if ($this->form_validation->run() == false) {
            //setup the input
            $dados['email'] = array('name' => 'email',
                'id'   => 'email',
            );

            if ($this->config->item('identity', 'ion_auth') == 'username') {
                $dados['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
            }
            else {
                $dados['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            //set any errors and display the form
            $dados['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->load->view('auth/forgot_password', $dados);
        }
        else {
            // get identity from username or email
            if ($this->config->item('identity', 'ion_auth') == 'username') {
                $identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
            }
            else {
                $identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
            }
            if (empty($identity)) {
                $this->ion_auth->set_message('forgot_password_email_not_found');
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("admin/auth/forgot_password", 'refresh');
            }

            //run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                //if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("admin/auth", 'refresh'); //we should display a confirmation page here instead of the login page
            }
            else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("admin/auth/forgot_password", 'refresh');
            }
        }
    }

    //reset password - final step for forgotten password
    public function reset_password($code = NULL) {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {
            //if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'),
                                                                       'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length',
                                                                                                                                                                                               'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                //display the form
                //set the flash data error message if there is one
                $dados['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $dados['min_password_length']  = $this->config->item('min_password_length', 'ion_auth');
                $dados['new_password']         = array(
                    'name'    => 'new',
                    'id'      => 'new',
                    'type'    => 'password',
                    'pattern' => '^.{' . $dados['min_password_length'] . '}.*$',
                );
                $dados['new_password_confirm'] = array(
                    'name'    => 'new_confirm',
                    'id'      => 'new_confirm',
                    'type'    => 'password',
                    'pattern' => '^.{' . $dados['min_password_length'] . '}.*$',
                );
                $dados['user_id']              = array(
                    'name'  => 'user_id',
                    'id'    => 'user_id',
                    'type'  => 'hidden',
                    'value' => $user->id,
                );
                $dados['csrf']                 = $this->_get_csrf_nonce();
                $dados['code']                 = $code;

                //render
                $this->_render_page('admin/login/reset_password', $dados);
            }
            else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                    //something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));
                }
                else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        //if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        $this->logout();
                    }
                    else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('admin/auth/reset_password/' . $code, 'refresh');
                    }
                }
            }
        }
        else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("admin/auth/forgot_password", 'refresh');
        }
    }

    function _get_csrf_nonce() {
        $this->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce() {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
                $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

}
