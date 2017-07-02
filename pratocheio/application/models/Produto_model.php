<?php

class Produto_model extends CI_Model{
    function __construct()    {
        parent::__construct();
    }
    
    /*
     * Get produto by id_produto
     */
    function get_produto($id_produto){
        return $this->db->get_where('produto',array('id_produto'=>$id_produto))->row_array();
    }
    
    /*
     * Get all produtos count
     */
    function get_all_produtos_count(){
        $this->db->from('produto');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all produtos
     */
    function get_all_produtos($params = array())
    {
        $this->db->order_by('id_produto', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('produto')->result_array();
    }
        
    /*
     * function to add new produto
     */
    function add_produto($params)
    {
        $this->db->insert('produto',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update produto
     */
    function update_produto($id_produto,$params)
    {
        $this->db->where('id_produto',$id_produto);
        return $this->db->update('produto',$params);
    }
    
    /*
     * function to delete produto
     */
    function delete_produto($id_produto)
    {
        return $this->db->delete('produto',array('id_produto'=>$id_produto));
    }
}
