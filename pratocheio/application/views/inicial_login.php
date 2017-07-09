<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div class="col-sm-6 col-sm-offset-6 col-md-5 col-md-offset-3 main">
    <form class="form-signin" role="form" method="post" action="<?= base_url('index.php/inicial/login') ?>">
        <div class="col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-4 main">
            <h2 class="form-signin-heading">Login</h2>
        </div>
        <br>
        <input type="text" class="form-control" placeholder="Usuário" required autofocus name="usuario">
        <br>
        <input type="password" class="form-control" placeholder="Senha" required name="senha">        
        <br>
        <select name="tipologin" class="form-control" required>
            <option value="C">Cliente</option>
            <option value="F">Funcionário</option>
        </select>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

    </form>

    <p align="center">
        Faça o login para terminar seu pedido. <br/>
        Ainda não é cadastrado? <a href="<?php echo base_url('cliente/adicionar') ?>">Cadastre-se aqui</a></p>
</div> <!-- /container -->

