<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <img src="<?php echo base_url() . 'assets/logo.png' ?>" class="img-thumbnail col-md-4"> 
    </div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <form class="form-signin" role="form" method="post" action="<?= base_url('index.php/inicial/login') ?>">
        <h2 class="form-signin-heading">Login</h2>
        <br>
        <input type="text" class="form-control" placeholder="Usuário" required autofocus name="usuario">
        <br>
        <input type="password" class="form-control" placeholder="Senha" required name="senha">
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

    </form>
</div> <!-- /container -->

