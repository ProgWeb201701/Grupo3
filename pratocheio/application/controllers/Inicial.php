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
        if ($this->testaLogado()){
            $this->principal();
        }  else {
            $this->mostraLogin();
        }
        
    }

    public function principal() {
        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        $this->load->view('inicial');
        $this->load->view('includes/html_footer');
    }

    public function mostraLogin() {
        $this->load->view('includes/html_header');
        $this->load->view('includes/menu');
        $this->load->view('inicial_login');
        $this->load->view('includes/html_footer');
    }
    public function login() {
        $usuario_padrao = 'adm';
        $senha_crip = '8653b4bdd17a379441d0eb6ffd2ddbd6';
        $usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);
        if (($senha == $senha_crip) && ($usuario == $usuario_padrao)) {
            $this->session->set_userdata("logado", 1);
            $this->principal();
        } else {
            echo 'Senha incorreta'; }
    }
    public function logout() {
        $this->session->unset_userdata("logado");
        $this->index();
    }
        public function testaLogado(){
        $logado=  $this->session->userdata('logado');
        if($logado==1){
            return true;
        }else{
            return FALSE;
        }
    }
}
