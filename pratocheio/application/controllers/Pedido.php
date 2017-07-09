<?php

/*
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Pedido extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Pedido_model');
        $this->load->model('Itempedido_model');
        $this->load->model('Produto_model');
        $this->load->model('Cliente_model');
        $this->load->model('Endereco_model');
    }

    /*
     * Lista de pedidos
     */

    function index() {
        $params['limit']  = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config               = $this->config->item('pagination');
        $config['base_url']   = site_url('pedido/index?');
        $config['total_rows'] = $this->Pedido_model->get_all_pedidos_count();
        $this->pagination->initialize($config);

        $data['pedidos']       = $this->Pedido_model->get_all_pedidos($params);
        $data['corpo_pagina']  = 'pedido/index';
        $data['titulo_pagina'] = 'Lista de Pedidos';
        $this->load->view('includes/template', $data);
    }

    /**
     * Adiciona o produto indicado no carrinho 
     */
    function adicionar_carrinho($id_produto) {
        //Busca os dados do produto
        $dadosProduto = $this->Produto_model->get_produto($id_produto);
        if (!$dadosProduto) {
            mostra_mensagem("Este produto não existe");
            return true;
        }

        //Pega a lista atual de produtos da sessão
        $listaPedido = $this->session->userdata('pedido');
        if (empty($listaPedido)) {
            $indice = 0;
        } else {
            $indice = max(array_keys($listaPedido)) + 1; //adiciona um indice depois do maior
        }

        //Adiciona um produto no na lista
        $listaPedido[$indice]['id_produto'] = $id_produto;
        $listaPedido[$indice]['indice']     = $indice;

        //Grava a lista novamente na sessao
        $this->session->set_userdata('pedido', $listaPedido);

        mostra_mensagem("O item foi adicionado ao carrinho.", site_url());
    }

    /**
     * Lista os itens atualmente no carrinho 
     */
    function carrinho() {
        //Busca os itens do carrinho da sessao
        $itensCarrinho = $this->session->userdata('pedido');
        if (!$itensCarrinho) {
            mostra_mensagem("Seu carrinho está vazio.", site_url());
            return false;
        }

        //Adiciona na variavel para mostrar na tela
        $i = 0;
        foreach ($itensCarrinho as $item) {
            $dadosItens[$i]['quantidade'] = isset($item['quantidade']) ? $item['quantidade'] : 1;
            $dadosItens[$i]['indice']     = $item['indice'];
            $dadosItens[$i]['dados']      = $this->Produto_model->get_produto($item['id_produto']);
            $i++;
        }

        //Verifica se o cliente esta logado para continuar a compra
        if (($this->session->userdata('logado') == 1) && ($this->session->userdata('tipo_login') == 'C')) {
            $dadosCliente          = $this->Cliente_model->get_cliente($this->session->userdata('id_cliente'));
            $dadosEndereco         = $this->Endereco_model->get_by_cliente($this->session->userdata('id_cliente'));
            $data['cliente']       = $dadosCliente;
            $data['endereco']      = $dadosEndereco;
            $data['itens_pedido']  = $dadosItens;
            $data['titulo_pagina'] = 'Lista de Produtos do Pedido';
            $data['corpo_pagina']  = 'pedido/carrinho.php';

            $this->load->view('includes/template.php', $data);
        } else { //Se nao estiver logado, redireciona para que o cliente possa logar
            redirect(base_url('inicial/mostraLogin'));
        }
    }
    
    /**
     * Remove o item indicado do carrinho
     * @param type $indice
     */

    function remover_item($indice) {
        //Recupera a lista da sessao
        $listaPedido = $this->session->userdata('pedido');
        
        //Remove o item da lista
        unset($listaPedido[$indice]);
        
        //Grava a nova lista na sessao
        $this->session->set_userdata('pedido', $listaPedido);
        mostra_mensagem("Item removido", base_url('pedido/carrinho'));
    }

    /**
     * Aumenta a quantidade do item selecionado no carrinho
     * @param type $indice
     */
    function aumenta_quantidade($indice) {
        //Pega a lista atual
        $listaPedido = $this->session->userdata('pedido');
        
        //Aumenta a quantidade do item
        $listaPedido[$indice]['quantidade'] ++;
        
        //Atualiza a lista
        $this->session->set_userdata('pedido', $listaPedido);
        
        //Redireciona para o carrinho
        redirect('pedido/carrinho');
    }

    /**
     * Diminui a quantidade do item no carrinho
     * @param type $indice
     */
    function diminui_quantidade($indice) {
        $listaPedido = $this->session->userdata('pedido');
        if ($listaPedido[$indice]['quantidade'] > 1)
            $listaPedido[$indice]['quantidade'] --;

        $this->session->set_userdata('pedido', $listaPedido);
        redirect('pedido/carrinho');
    }

    /**
     * Fecha o pedido e grava os dados em banco
     * @return boolean
     */
    function fechar() {
        $logado    = $this->session->userdata('logado');
        $tipoLogin = $this->session->userdata('tipo_login');

        if (($logado != 1) || ($tipoLogin != "C")) {
            redirect('inicial/mostraLogin');
            return true;
        }

        //Validação
        $erro       = false;
        $listaItens = $this->session->userdata('pedido');
        if (empty($listaItens)) {
            $erro = true;
        }

        $idCliente = $this->input->post('id_cliente');
        if (empty($idCliente)) {
            $erro = true;
        }
        $valorTotal = $this->input->post('valor_total');
        if (empty($valorTotal)) {
            $erro = true;
        }

        $tipoPagamento = $this->input->post('tipo_pagamento');
        if (empty($tipoPagamento)) {
            $erro = true;
        }

        $tipoEntrega = $this->input->post('tipoEntrega');
        if (empty($tipoEntrega)) {
            $erro = true;
        }

        if ($erro) {
            mostra_mensagem("Ocorreu um erro no fechamento do seu pedido. "
                    . "<br/>Verifique se você preencheu os dados na tela do carrinho de compras corretamente.");
            return true;
        } else {
            //Gravação do pedido
            $params = array(
                'id_cliente'      => $this->input->post('id_cliente'),
                'valor_total'     => $this->input->post('valor_total'),
                'tipo_pagamento'  => $this->input->post('tipo_pagamento'),
                'dataHora'        => date('Y-m-d H:i:s'),
                'troco'           => $this->input->post('troco'),
                'previsaoEntrega' => '1 hora',
                'statusAndamento' => 'A',
                'tipoEntrega'     => $this->input->post('tipoEntrega'),
            );

            $id_pedido = $this->Pedido_model->add_pedido($params);

            if (!$id_pedido) {
                mostra_mensagem("Ocorreu um erro na gravação do seu pedido. Tente novamente.");
                return true;
            }

            // Grava os Itens do pedido
            $produtos    = $_POST['id_produto'];
            $quantidades = $_POST['quantidade'];
            $valores     = $_POST['valor'];
            $observacoes = $_POST['observacoes'];

            for ($item = 0; $item < count($produtos); $item++) {
                $paramsPedido = array('id_pedido'   => $id_pedido,
                    'valor'       => $valores[$item],
                    'quantidade'  => $quantidades[$item],
                    'observacoes' => $observacoes[$item],
                    'id_produto'  => $produtos[$item]);

                $id_item = $this->Itempedido_model->add_itempedido($paramsPedido);
                if (!$id_item) {
                    mostra_mensagem("Ocorreu um erro na gravação de um item do seu pedido. Tente novamente.");
                    return true;
                }
            }

            mostra_mensagem("Pedido númmero <b>$id_pedido</b> realizado com sucesso. "
                    . "<br/> A Previsão de entrega é de 1 hora."
                    . "<br/>Clique em Voltar para retornar à Página inicial.", base_url());
            return true;
        }
    }

    /**
     * Mostra o status atual do pedido (mesma tela para cliente e funcionario). 
     * A diferenca é que o funcionario pode atualizar o status
     * @param type $id_pedido
     * @return boolean
     */
    function status_pedido($id_pedido) {

        $clienteLogado = $this->session->userdata('id_cliente');
        $logado        = $this->session->userdata('logado');
        $tipoLogin     = $this->session->userdata('tipo_login');

        if ($logado != 1) {
            redirect('inicial/mostraLogin');
            return true;
        }

        $dadosPedido = $this->Pedido_model->get_pedido($id_pedido);
        if (!$dadosPedido) {
            mostra_mensagem("Pedido não localizado.");
            return true;
        }

        $dadosItens = $this->Itempedido_model->get_itens_pedido($id_pedido);
        if (!$dadosItens) {
            mostra_mensagem("Este pedido não possui itens");
            return true;
        }

        $dadosCliente = $this->Cliente_model->get_cliente($dadosPedido['id_cliente']);
        if (!$dadosCliente) {
            mostra_mensagem("Dados do Cliente não encontrados.");
            return true;
        }

        $dadosEndereco = $this->Endereco_model->get_by_cliente($dadosPedido['id_cliente']);
        if (!$dadosEndereco) {
            mostra_mensagem("Dados do Endereço não encontrados.");
            return true;
        }

        if (($tipoLogin == 'C') && ($dadosPedido['id_cliente'] != $clienteLogado)) {
            mostra_mensagem("Dados não localizados");
            return true;
        }

        $data['podeAtualizar'] = false;
        if ($tipoLogin == 'F') {
            $data['podeAtualizar'] = true;
        }

        $data['cliente']      = $dadosCliente;
        $data['endereco']     = $dadosEndereco;
        $data['pedido']       = $dadosPedido;
        $data['itens_pedido'] = $dadosItens;

        switch ($dadosPedido['tipo_pagamento']) {
            case 'D': $data['tipo_pagamento'] = "Dinheiro";
                break;
            case 'C': $data['tipo_pagamento'] = "Cartão de Crédito";
                break;
        }

        switch ($dadosPedido['tipoEntrega']) {
            case 'E': $data['tipoEntrega'] = "Entrega em Domicílio";
                break;
            case 'B': $data['tipoEntrega'] = "Busca no Delivery";
                break;
        }

        switch ($dadosPedido['statusAndamento']) {
            case 'A': $data['statusAndamento'] = "Aguardando";
                break;
            case 'P': $data['statusAndamento'] = "Em preparo";
                break;
            case 'S': $data['statusAndamento'] = "Saiu para Entrega";
                break;
            case 'E': $data['statusAndamento'] = "Entregue";
                break;
            case 'C': $data['statusAndamento'] = "Cancelado";
                break;
        }

        $data['corpo_pagina'] = 'pedido/status_pedido';

        $this->load->view('includes/template.php', $data);
    }

    /**
     * Atualiza o pedido de ID x para o status indicado
     * @param type $status
     * @param type $id_pedido
     * @return boolean
     */
    function atualizar_status($status, $id_pedido) {
        $logado    = $this->session->userdata('logado');
        $tipoLogin = $this->session->userdata('tipo_login');

        if (($logado != 1) || ($tipoLogin != 'F')) {
            mostra_mensagem("Pedido não localizado.");
            return true;
        }

        $dadosPedido = $this->Pedido_model->get_pedido($id_pedido);
        if (!$dadosPedido) {
            mostra_mensagem("Pedido não localizado.");
            return true;
        }

        if (!in_array($status, array('A', 'P', 'E', 'S', 'C'))) {
            mostra_mensagem("Situação de pedido inválida.");
            return true;
        }

        $params = array(
            'statusAndamento' => $status
        );

        $this->Pedido_model->update_pedido($id_pedido, $params);

        redirect('pedido/status_pedido/' . $id_pedido);
    }

    /**
     * Lista os pedidos do cliente logado
     * @return boolean
     */
    function meus_pedidos() {
        $logado     = $this->session->userdata('logado');
        $id_cliente = $this->session->userdata('id_cliente');
        $tipoLogin  = $this->session->userdata('tipo_login');

        if (($logado != 1) || ($tipoLogin != 'C')) {
            mostra_mensagem("Pedidos não localizados.");
            return true;
        }
        
        $dadosCliente = $this->Cliente_model->get_cliente($id_cliente);
        if (!$dadosCliente) {
            mostra_mensagem("Dados do Cliente não encontrados.");
            return true;
        }
        
        $params['limit']  = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config               = $this->config->item('pagination');
        $config['base_url']   = site_url('pedido/meus_pedidos?');
        $config['total_rows'] = $this->Pedido_model->get_pedidos_cliente_count($id_cliente);
        $this->pagination->initialize($config);

        $data['pedidos']       = $this->Pedido_model->get_pedidos_cliente($params, $id_cliente);
        $data['corpo_pagina']  = 'pedido/pedidos_cliente';
        $data['titulo_pagina'] = 'Meus Pedidos';
        $this->load->view('includes/template', $data);
    }

}
