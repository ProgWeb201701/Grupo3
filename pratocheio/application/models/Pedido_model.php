<?php

 
class Pedido_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    /*
     * Get pedido by id_pedido
     */
    function get_pedido($id_pedido){
        return $this->db->get_where('pedido',array('id_pedido'=>$id_pedido))->row_array();
    }
    
    /*
     * Get all pedidos count
     */
    function get_all_pedidos_count()
    {
        $this->db->from('pedido');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all pedidos
     */
    function get_all_pedidos($params = array()) {
        $this->db->join('cliente', 'pedido.id_cliente = cliente.id_cliente');
        $this->db->order_by('id_pedido', 'desc');
        if(isset($params) && !empty($params)){
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('pedido')->result_array();
    }
        
    /*
     * function to add new pedido
     */
    function add_pedido($params)
    {
        $this->db->insert('pedido',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pedido
     */
    function update_pedido($id_pedido,$params)
    {
        $this->db->where('id_pedido',$id_pedido);
        return $this->db->update('pedido',$params);
    }
    
    /*
     * function to delete pedido
     */
    function delete_pedido($id_pedido)
    {
        return $this->db->delete('pedido',array('id_pedido'=>$id_pedido));
    }
    
    function get_pedidos_cliente($params = array(),$id_cliente) {
        $this->db->join('cliente', 'pedido.id_cliente = cliente.id_cliente');
        $this->db->where('pedido.id_cliente', $id_cliente);
        $this->db->order_by('id_pedido', 'desc');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('pedido')->result_array();
    }

    /*
     * Get all pedidos count
     */

    function get_pedidos_cliente_count($id_cliente) {
        $this->db->where('id_cliente', $id_cliente);
        $this->db->from('pedido');
        return $this->db->count_all_results();
    }
}
