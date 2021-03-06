<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Endereco_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get endereco by id_endereco
     */
    function get_endereco($id_endereco)
    {
        return $this->db->get_where('endereco',array('id_endereco'=>$id_endereco))->row_array();
    }
    
    /*
     * Get all enderecos count
     */
    function get_all_enderecos_count()
    {
        $this->db->from('endereco');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all enderecos
     */
    function get_all_enderecos($params = array())
    {
        $this->db->order_by('id_endereco', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('endereco')->result_array();
    }
        
    /*
     * function to add new endereco
     */
    function add_endereco($params)
    {
        $this->db->insert('endereco',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update endereco
     */
    function update_endereco($id_endereco,$params)
    {
        $this->db->where('id_endereco',$id_endereco);
        return $this->db->update('endereco',$params);
    }
    
    /*
     * function to delete endereco
     */
    function delete_endereco($id_endereco)
    {
        return $this->db->delete('endereco',array('id_endereco'=>$id_endereco));
    }
    
    function get_by_cliente($id_cliente) {
        return $this->db->get_where('endereco',array('id_cliente'=>$id_cliente))->row_array();
    } 
    
    function delete_by_cliente($id_cliente) {
        return $this->db->delete('endereco',array('id_cliente'=>$id_cliente));
    } 
    
    
}
