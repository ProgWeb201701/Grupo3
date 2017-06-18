<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Funcionario extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Funcionario_model');
    } 

    /*
     * Listing of funcionarios
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('funcionario/index?');
        $config['total_rows'] = $this->Funcionario_model->get_all_funcionarios_count();
        $this->pagination->initialize($config);

        $data['funcionarios'] = $this->Funcionario_model->get_all_funcionarios($params);
        
        $data['_view'] = 'funcionario/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new funcionario
     */
    function adicionar()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('senha','Senha','required|max_length[255]');
		$this->form_validation->set_rules('usuario','Usuario','required|max_length[255]');
		$this->form_validation->set_rules('nome','Nome','required|max_length[100]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'senha' => $this->input->post('senha'),
				'usuario' => $this->input->post('usuario'),
				'nome' => $this->input->post('nome'),
            );
            
            $funcionario_id = $this->Funcionario_model->add_funcionario($params);
            redirect('funcionario/index');
        }
        else
        {            
            $data['_view'] = 'funcionario/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a funcionario
     */
    function editar($id_login)
    {   
        // check if the funcionario exists before trying to edit it
        $data['funcionario'] = $this->Funcionario_model->get_funcionario($id_login);
        
        if(isset($data['funcionario']['id_login']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('senha','Senha','required|max_length[255]');
			$this->form_validation->set_rules('usuario','Usuario','required|max_length[255]');
			$this->form_validation->set_rules('nome','Nome','required|max_length[100]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'senha' => $this->input->post('senha'),
					'usuario' => $this->input->post('usuario'),
					'nome' => $this->input->post('nome'),
                );

                $this->Funcionario_model->update_funcionario($id_login,$params);            
                redirect('funcionario/index');
            }
            else
            {
                $data['_view'] = 'funcionario/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The funcionario you are trying to edit does not exist.');
    } 

    /*
     * Deleting funcionario
     */
    function remover($id_login)
    {
        $funcionario = $this->Funcionario_model->get_funcionario($id_login);

        // check if the funcionario exists before trying to delete it
        if(isset($funcionario['id_login']))
        {
            $this->Funcionario_model->delete_funcionario($id_login);
            redirect('funcionario/index');
        }
        else
            show_error('The funcionario you are trying to delete does not exist.');
    }
    
}
