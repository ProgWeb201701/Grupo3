<br/><br/>
<p align="center">
    <?= $mensagem ?>

    <br/><br/>
    <?php if (!$voltar)  
        $voltar = "javascript:history.go(-1);";
    ?>
    <a href="<?php echo $voltar?>" class="btn btn-danger">Voltar</a>
</p>