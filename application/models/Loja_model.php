<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Loja_model extends CI_Model{
    
    public function get_grandes_marcas() {
        
        $this->db->select([
            'marcas.*'
        ]);
        
        $this->db->where('marca_ativa', 1);
        
        $this->db->join('produtos', 'produtos.produto_marca_id = marcas.marca_id');
        
        $this->db->group_by('marca_nome');
        
        return $this->db->get('marcas') ->result();
        
    }
    
    
}

