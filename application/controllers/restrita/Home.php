<?php

defined('BASEPATH') OR exit('Ação não permitida');
    
    class Home extends CI_Controller{
        
        public function __construct() {
            parent::__construct();
            
            //EXISTE SEÇÃO VALIDA?
        }
        
        public function index() {
            
            $this->load->view('restrita/home/index');
            
        }
    }
