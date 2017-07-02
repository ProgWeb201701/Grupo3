<?php

 
class Itempedido_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get itempedido by id_item
     */
    function get_itempedido($id_item)
    {
        return $this->db->get_where('itempedido',array('id_item'=>$id_item))->row_array();
    }
    
    /*
     * Get all itenspedido count
     */
    function get_all_itenspedido_count()
    {
        $this->db->from('itempedido');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all itenspedido
     */
    function get_all_itenspedido($params = array())
    {
        $this->db->order_by('id_item', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('itempedido')->result_array();
    }
        
    /*
     * function to add new itempedido
     */
    function add_itempedido($params)
    {
        $this->db->insert('itempedido',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update itempedido
     */
    function update_itempedido($id_item,$params)
    {
        $this->db->where('id_item',$id_item);
        return $this->db->update('itempedido',$params);
    }
    
    /*
     * function to delete itempedido
     */
    function delete_itempedido($id_item)
    {
        return $this->db->delete('itempedido',array('id_item'=>$id_item));
    }
     function get_itens_pedido($id_pedido) {
        $this->db->join('produto','produto.id_produto = itempedido.id_produto');
        return $this->db->get_where('itempedido',array('id_pedido'=>$id_pedido))->result_array();
        
    }
}
