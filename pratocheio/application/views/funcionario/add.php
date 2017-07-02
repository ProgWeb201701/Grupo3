<div class="row-fluid">
    <?php echo form_open('funcionario/adicionar', array("class" => "form-horizontal")); ?>

    <div class="col-sm-9 ">
        <h1><?= $titulo_pagina ?></h1>
        <HR SIZE="2">
        <br/>


        <div class="form-group">
            <label for="nome" class="col-md-2 control-label"><span class="text-danger">*</span>Nome</label>
            <div class="col-md-10">
                <input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
                <span class="text-danger"><?php echo form_error('nome'); ?></span>
            </div>
        </div>	

        <div class="form-group">
            <label for="usuario" class="col-md-2 control-label"><span class="text-danger">*</span>Usuário</label>
            <div class="col-md-10">
                <input type="text" name="usuario" value="<?php echo $this->input->post('usuario'); ?>" class="form-control" id="usuario" />
                <span class="text-danger"><?php echo form_error('usuario'); ?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="senha" class="col-md-2 control-label"><span class="text-danger">*</span>Senha</label>
            <div class="col-md-10">
                <input type="password" name="senha" value="<?php echo $this->input->post('senha'); ?>" class="form-control" id="senha" />
                <span class="text-danger"><?php echo form_error('senha'); ?></span>
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-6 col-sm-6">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="javascript:history.go(-1)" class="btn btn-danger">Voltar</a>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>