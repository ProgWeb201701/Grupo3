<div class="row-fluid">
<?php echo form_open('produto/editar/'.$produto['id_produto'],array("class"=>"form-horizontal")); ?>

<div class="col-sm-9 ">
    <h1><?= $titulo_pagina ?></h1>
     <HR SIZE="2">
    <br/>

        <div class="form-group">
            <label for="nome_produto" class="col-md-2 control-label"><span class="text-danger">*</span>Nome Produto</label>
            <div class="col-md-10">
                <input type="text" name="nome_produto" value="<?php echo $this->input->post('nome_produto'); ?>" class="form-control" id="nome_produto" />
                <span class="text-danger"><?php echo form_error('nome_produto'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label for="preco" class="col-md-2 control-label"><span class="text-danger">*</span>PreÃ§o</label>
            <div class="col-md-10">
                <input type="number" step=".01" name="preco" value="<?php echo $this->input->post('preco'); ?>" class="form-control" id="preco" />
                <span class="text-danger"><?php echo form_error('preco'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label for="descri" class="col-md-2 control-label"><span class="text-danger">*</span>DescriÃ§Ã£o</label>
            <div class="col-md-10">
                <textarea name="descri" rows="5" cols="60" class="form-control" id="descri"><?php echo $this->input->post('descri'); ?></textarea>
                <span class="text-danger"><?php echo form_error('descri'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label for="foto" class="col-md-2 control-label">Foto</label>
            <div class="col-md-10">            
                <input type="file" name="foto" class="form-control" id="foto" />
                <span class="text-danger"><?php echo form_error('foto'); ?></span>
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