 
<div id="banner" class="col-sm-2 col-sm-offset-10 col-md-12 col-md-offset-0 main">
    <center>
        <img src="<?php echo base_url() . 'assets/logo.png' ?>" width="20%" height="20%"> 
    </center>
</div>
<nav class="navbar navbar-default navbar-fixed-top">
    <div id="navbar" class="navbar-collapse collapse">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

 <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url() ?>">Home <span class="sr-only">Delivery Prato Cheio</span></a></li>


                <?php if (
                        (($this->session->userdata('logado') == 1) && ($this->session->userdata('tipo_login') == 'C'))
                        || $this->session->userdata('logado') != 1): ?>
                    <li><a href="<?php echo base_url('pedido/carrinho') ?>">Carrinho de Compras</a></li>
                <?php endif; ?>
                <?php if (($this->session->userdata('logado') == 1) && ($this->session->userdata('tipo_login') == 'C')): ?>                    
                    <li><a href="<?php echo base_url('pedido/meus_pedidos') ?>">Meus Pedidos</a></li>
                <?php endif; ?>
                

                <?php if (($this->session->userdata('logado') == 1) && ($this->session->userdata('tipo_login') == 'F')): ?>                    
                    <li><a href="<?php echo base_url() ?>index.php/cliente/" target="_self">Clientes</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/produto/" target="_self">Produtos</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/funcionario/" target="_self">FuncionÃ¡rios</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/pedido/" target="_self">Pedidos</a></li>
                <?php endif; ?>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->session->userdata('logado') == 1): ?>
                    <?php if (($this->session->userdata('tipo_login') == 'C')): ?>
                        <li><a href="<?php echo base_url() ?>index.php/cliente/editar/<?= $this->session->userdata('id_cliente') ?>" target="_self">Editar meus dados</a></li>
                    <?php endif; ?>
                    <li><a href='<?php echo base_url() ?>index.php/inicial/logout'>Sair</a></li>
                <?php else: ?>
                    <li><a href='<?php echo base_url() ?>index.php/cliente/adicionar'>Cadastro</a></li>
                    <li><a href='<?php echo base_url() ?>index.php/inicial/mostraLogin'>Login</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>


