<div class="row-fluid">
    <h1><?= $titulo_pagina ?></h1>
    <HR SIZE="2">
    <br/>

    <p align="center">
        <img src="<?php echo base_url($produto['foto']) ?>" 
             width="30%" height="30%"
             alt="<?php echo $produto['nome_produto'] ?>"/>    
    </p>

    <p align="center">
        <a href="javascript:history.go(-1)" class="btn btn-danger">Voltar</a>
    </p>
</div>
