<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
                $sistema = info_header_footer();
                
                $data = array(
                    'titulo' => 'Seja bem vindo(a) à loja virtual '. $sistema->sistema_nome_fantasia,
                    
                );
                
               
            
		$this->load->view('web/layout/header', $data);
                $this->load->view('web/loja');
                $this->load->view('web/layout/footer');
                
                
	}
        
}
