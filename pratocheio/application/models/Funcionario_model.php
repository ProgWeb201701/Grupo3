<?php

 
class Funcionario_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    /*
     * Get funcionario by id_login
     */
    function get_funcionario($id_login){
        return $this->db->get_where('funcionario',array('id_login'=>$id_login))->row_array();
    }
    
    /*
     * Get all funcionarios count
     */
    function get_all_funcionarios_count(){
        $this->db->from('funcionario');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all funcionarios
     */
    function get_all_funcionarios($params = array())
    {
        $this->db->order_by('id_login', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('funcionario')->result_array();
    }
        
    /*
     * function to add new funcionario
     */
    function add_funcionario($params)
    {
        $this->db->insert('funcionario',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update funcionario
     */
    function update_funcionario($id_login,$params){
        $this->db->where('id_login',$id_login);
        return $this->db->update('funcionario',$params);
    }
    
    /*
     * function to delete funcionario
     */
    function delete_funcionario($id_login){
        return $this->db->delete('funcionario',array('id_login'=>$id_login));
    }
    
     function verificaSenha($usuario, $senha) {
        $this->db->where('usuario', trim($usuario));
        $this->db->where('senha', trim($senha));
        return $this->db->get('funcionario')->row_array();
    }
}
