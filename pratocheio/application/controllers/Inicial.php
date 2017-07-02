<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicial extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->principal();
    }

    public function principal() {
        $this->cardapio();
    }

    public function mostraLogin() {
        $data['corpo_pagina'] = 'inicial_login.php';
        $this->load->view('includes/template.php', $data);
    }

    public function login() {
        $this->load->model('cliente_model');
        $this->load->model('funcionario_model');
        $usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);
        $tipo = $_POST['tipologin'];

        if ($tipo == 'C') {
            $dadosCliente = $this->cliente_model->verificaSenha($usuario, $senha);
            if (!$dadosCliente) {
                mostra_mensagem("Senha Incorreta");
            } else {
                $this->session->set_userdata('logado', '1');
                $this->session->set_userdata('tipo_login', 'C');
                $this->session->set_userdata('id_cliente', $dadosCliente['id_cliente']);
                $this->session->set_userdata('nome_cliente', $dadosCliente['nome']);
                $this->session->set_userdata('email_cliente', $dadosCliente['email']);
                $this->principal();
            }
        }
        if ($tipo == 'F') {
            $dadosFuncionario = $this->funcionario_model->verificaSenha($usuario, $senha);
            if (!$dadosFuncionario) {
                mostra_mensagem("Senha Incorreta");
            } else {
                $this->session->set_userdata('logado', '1');
                $this->session->set_userdata('tipo_login', 'F');
                $this->session->set_userdata('id_login', $dadosFuncionario['id_login']);
                $this->session->set_userdata('nome', $dadosFuncionario['nome']);
                $this->session->set_userdata('usuario', $dadosFuncionario['usuario']);
                $this->principal();
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('inicial/principal');
    }

    public function testaLogado() {
        $logado = $this->session->userdata('logado');
        if ($logado == 1) {
            return true;
        } else {
            return FALSE;
        }
    }

    function cardapio() {
        $this->load->model('Produto_model');
        $data['produtos'] = $this->Produto_model->get_all_produtos();
        $data['corpo_pagina'] = 'cardapio.php';
        $this->load->view('includes/template.php', $data);
    }

}
