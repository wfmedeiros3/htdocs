<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Login extends CI_Controller{
    
    public function index() {
        
        $data = array(
            'titulo' => 'Login na área restrita',
        );
        
            $this->load->view('restrita/layout/header');

            $this->load->view('restrita/login/index');
            
            $this->load->view('restrita/layout/footer');
        
    }
    
}

