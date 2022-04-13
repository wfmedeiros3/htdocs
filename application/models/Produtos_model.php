<?php

defined ('BASEPATH') OR exit('Ação não permitida');

class Produtos_model extends CI_Model{
    
    // utilizado na area restrita
    public function get_all() {
        
        
        $this->db->select([
           'produtos.produto_id',
           'produtos.produto_codigo',
           'produtos.produto_nome',
           'produtos.produto_valor',
           'produtos.produto_ativo',
           'categorias.categoria_id',
           'categorias.categoria_nome',
           'marcas.marca_nome',
            
        ]);
        
        $this->db->join('categorias', 'categorias.categoria_id = produtos.produto_categoria_id', 'LEFT');
        $this->db->join('marcas', 'marcas.marca_id = produtos.produto_marca_id', 'LEFT');
        
        return $this->db->get('produtos')->result();
    }

    //recupera o produto para detalha-lo
    
    public function get_by_id($produto_meta_link = NULL) {
        
        $this->db->select([
           'produtos.produto_id',
           'produtos.produto_codigo',
           'produtos.produto_nome',
           'produtos.produto_valor',
           'produtos.produto_meta_link',
           'produtos.produto_quantidade_estoque',
           'produtos.produto_descricao',
           'categorias_pai.categoria_pai_nome',
           'categorias_pai.categoria_pai_meta_link',
           'categorias.categoria_id',
           'categorias.categoria_nome',
           'categorias.categoria_meta_link',
           'marcas.marca_id',
           'marcas.marca_nome',
           'marcas.marca_meta_link',
            
        ]);
        
        $this->db->where('produtos.produto_meta_link', $produto_meta_link);
        
        $this->db->join('marcas', 'marcas.marca_id = produtos.produto_marca_id');
        $this->db->join('categorias', 'categorias.categoria_id = produtos.produto_categoria_id');
        $this->db->join('categorias_pai', 'categorias_pai.categoria_pai_id = categorias.categoria_pai_id');
        
        return $this->db->get('produtos')->row();
        
    }
}
