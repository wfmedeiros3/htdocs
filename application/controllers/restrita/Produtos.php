<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Produtos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('restrita/login');
        }
    }

    public function index() {


        $data = array(
            'titulo' => 'Produtos cadastradas',
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
            'produtos' => $this->produtos_model->get_all(),
        );

        // echo '<pre>';
        // print_r($data['produtos']);
        // exit();


        $this->load->view('restrita/layout/header', $data);

        $this->load->view('restrita/produtos/index');

        $this->load->view('restrita/layout/footer');
    }

    public function core($produto_id = null) {

        $produto_id = (int) $produto_id;

        if (!$produto_id) {

            //cadastrando
        } else {

            if (!$produto = $this->core_model->get_by_id('produtos', array('produto_id' => $produto_id))) {

                $this->session->set_flashdata('erro', 'Esse produto não foi encontrado');
                redirect('restrita/produtos');
            } else {

                //editando produto
                //validando

                $data = array(
                    'titulo' => 'Editar produto',
                    'styles' => array(
                        'jquery-upload-file/css/uploadfile.css',
                        
                    ),
                    'scripts' => array(
                    'jquery-upload-file/js/jquery.uploadfile.min.js',
                    'jquery-upload-file/js/produtos.js',
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ),
                    'produto' => $produto,
                    'fotos_produto' => $this->core_model->get_all('produtos_fotos', array('foto_produto_id' => $produto_id)),
                    'categorias' => $this->core_model->get_all('categorias', array('categoria_ativa' => 1)),
                    'marcas' => $this->core_model->get_all('marcas', array('marca_ativa' => 1)),
                );

               // echo '<pre>';
               // print_r($data['produto']);
              //  exit();


                $this->load->view('restrita/layout/header', $data);

                $this->load->view('restrita/produtos/core');

                $this->load->view('restrita/layout/footer');

                //validações
            }
        }
    }

}
