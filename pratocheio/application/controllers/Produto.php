<?php

class Produto extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produto_model');
    } 

    /*
     * Listing of produtos
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('produto/index?');
        $config['total_rows'] = $this->Produto_model->get_all_produtos_count();
        $this->pagination->initialize($config);

        $data['produtos'] = $this->Produto_model->get_all_produtos($params);
        
        $data['titulo_pagina'] = 'Lista de Produtos';
        $data['corpo_pagina']  = 'produto/index.php';
        $this->load->view('includes/template.php', $data);
    }

    /*
     * Adding a new produto
     */
    function adicionar(){   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome_produto','Nome Produto','required|max_length[100]');
		$this->form_validation->set_rules('preco','Preco','required|numeric');
		$this->form_validation->set_rules('descri','Descri','required|max_length[255]');
		
		
	 if ($this->form_validation->run()) {
            //Faz o upload da foto, se houver                
            if (isset($_FILES['foto'])) {
                $retorno = $this->enviar_foto();
                
                if ($retorno['upload_data']) {
                    $nomeFoto = './assets/fotos/' . $retorno['upload_data']['file_name'];
                }
                if ($retorno['error']) {
                    mostra_mensagem("Ocorreu um erro no envio da sua foto.");
                    $nomeFoto = null;
                }
            }

            $params = array(
                'nome_produto' => $this->input->post('nome_produto'),
                'preco'        => $this->input->post('preco'),
                'descri'       => $this->input->post('descri'),
                'foto'         => $nomeFoto
            );

            $produto_id = $this->Produto_model->add_produto($params);
            redirect('produto/index');
        } else {
            $data['titulo_pagina'] = 'Adicionar Produto';
            $data['corpo_pagina']  = 'produto/add.php';
            $this->load->view('includes/template.php', $data);
        }
    }  

    /*
     * Editing a produto
     */
    function editar($id_produto){   
        
        $data['produto'] = $this->Produto_model->get_produto($id_produto);
        
        if(isset($data['produto']['id_produto'])){
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nome_produto','Nome Produto','required|max_length[100]');
			$this->form_validation->set_rules('preco','Preco','required|numeric');
			$this->form_validation->set_rules('descri','Descri','required|max_length[255]');
			
		
			  if ($this->form_validation->run()) {

                //Faz o upload da foto, se houver                
                if (isset($_FILES['foto'])) {
                    $retorno = $this->enviar_foto();
                    if ($retorno['upload_data']) {
                        $nomeFoto = './assets/fotos/' . $retorno['upload_data']['file_name'];
                    }

                    if ($retorno['error']) {
                        mostra_mensagem("Ocorreu um erro no envio da sua foto.");
                        $nomeFoto = null;
                    }
                }

                $params = array(
                    'nome_produto' => $this->input->post('nome_produto'),
                    'preco'        => $this->input->post('preco'),
                    'descri'       => $this->input->post('descri'),
                    'foto'         => $nomeFoto
                );

                $this->Produto_model->update_produto($id_produto, $params);
                redirect('produto/index');
            } else {
                $data['titulo_pagina'] = 'Editar Produto';
                $data['corpo_pagina']  = 'produto/edit.php';
                $this->load->view('includes/template.php', $data);
            }
        } else
            mostra_mensagem('O produto que vocé está tentando editar não existe.');
    } 

    /*
     * Deleting produto
     */
    function remover($id_produto){
        $produto = $this->Produto_model->get_produto($id_produto);

        // check if the produto exists before trying to delete it
        if(isset($produto['id_produto']))
        {
            $this->Produto_model->delete_produto($id_produto);
            redirect('produto/index');
        }
        else
             mostra_mensagem('O produto que vocé está tentando remover não existe.');
    }
    
    
    function enviar_foto() {
        $config['upload_path']   = './assets/fotos/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }

    function ver_foto($id_produto) {
        $data['produto'] = $this->Produto_model->get_produto($id_produto);
        
        if ((!@$data['produto']) || (!@$data['produto']['foto'])) {
            mostra_mensagem("NÃ£o foi possÃ­vel localizar a foto do produto");
        } else {
            $data['titulo_pagina'] = $data['produto']['nome_produto'] . ' - Foto ';
            $data['corpo_pagina']  = 'produto/foto.php';
            $this->load->view('includes/template.php', $data);
        }
    }
    
}
