  

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>">Delivery Prato Cheio</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href='<?php echo base_url() ?>index.php/cliente/adicionar'>Cadastro</a></li>
                
               <?php if($this->session->userdata('logado')==1):?>
                <li><a href='<?php echo base_url() ?>index.php/inicial/logout'>Sair</a></li>
                
                <?php else:?>
                <li><a href='<?php echo base_url() ?>index.php/inicial/mostraLogin'>Login</a></li>
                 <?php endif;?>
                
                
            </ul>
        </div>
    </div>
</nav>
