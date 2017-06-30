 



<div class="col-sm-2 col-sm-offset-10 col-md-12 col-md-offset-0 main">
    <img src="<?php echo base_url() . 'assets/logo3.png' ?>" style="width:1200px; height: 220px; margin-top: -19px;" class="img-thumbnail col-md-4"> 
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
                <li class="active"><a href="#">Home <span class="sr-only">Delivery Prato Cheio</span></a></li>

                <li><a href="#">Cardápio</a></li>
                <li><a href="#">Pedido</a></li>
                <li><a href="<?php echo base_url() ?>index.php/cliente/editar" target="_self">Area do Cliente</a></li>
                    

            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li><a href='<?php echo base_url() ?>index.php/cliente/adicionar'>Cadastro</a></li>

                <?php if ($this->session->userdata('logado') == 1): ?>
                    <li><a href='<?php echo base_url() ?>index.php/inicial/logout'>Sair</a></li>

                <?php else: ?>
                    <li><a href='<?php echo base_url() ?>index.php/inicial/mostraLogin'>Login</a></li>
                <?php endif; ?>


            </ul>
        </div>
    </div>
</nav>


