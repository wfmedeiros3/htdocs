<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //sessão valida?
    }

    public function index() {

        $data = array(
            'titulo' => 'Usuários cadastrados',
            'styles' => array(
                'bundles/datatables/datatables.min.css',
                'bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'bundles/datatables/datatables.min.js',
                'bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
                'bundles/jquery-ui/jquery-ui.min.js',
                'js/page/datatables.js'
            ),
            'usuarios' => $this->ion_auth->users()->result(), //pegando todos os usuarios
        );

        /*         * echo '<pre>';
          print_r($data['usuarios']);
          exit();
         */

        $this->load->view('restrita/layout/header', $data);

        $this->load->view('restrita/usuarios/index');

        $this->load->view('restrita/layout/footer');
    }

    public function core($usuario_id = NULL) {

        if (!$usuario_id) {

            // cadastrar usuario
            
            exit('cadastrar usuario');
        } else {

            if (!$usuario = $this->ion_auth->user($usuario_id)->row()) {
                exit('Não existe');
            } else {
                
                $data = array (
                    'titulo' => 'Editar usuário',
                    'usuario' => $usuario,
                    
                    'perfil' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                    'grupos' => $this->ion_auth->groups()->result(),
                );

                $this->load->view('restrita/layout/header', $data);

                $this->load->view('restrita/usuarios/core');

                $this->load->view('restrita/layout/footer');
            }
        }
    }

}
