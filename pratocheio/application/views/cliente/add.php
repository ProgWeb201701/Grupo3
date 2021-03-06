<div class="row-fluid">
    <?php echo form_open('cliente/adicionar', array("class" => "form-horizontal")); ?>

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
            <label for="telefone" class="col-md-2 control-label"><span class="text-danger">*</span>Telefone</label>
            <div class="col-md-10">
                <input type="text" name="telefone" value="<?php echo $this->input->post('telefone'); ?>" class="form-control" id="telefone" />
                <span class="text-danger"><?php echo form_error('telefone'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label for="dt_nasc" class="col-md-2 control-label">Dt Nasc</label>
            <div class="col-md-10">
                <input type="text" name="dt_nasc" value="<?php echo $this->input->post('dt_nasc'); ?>" class="form-control" id="dt_nasc" />
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-2 control-label"><span class="text-danger">*</span>Email</label>
            <div class="col-md-10">
                <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
                <span class="text-danger"><?php echo form_error('email'); ?></span>
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
            <label for="rua" class="col-md-2 control-label"><span class="text-danger">*</span>Rua</label>
            <div class="col-md-10">
                <input type="text" name="rua" value="<?php echo $this->input->post('rua'); ?>" class="form-control" id="rua" />
                <span class="text-danger"><?php echo form_error('rua'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label for="numero" class="col-md-2 control-label"><span class="text-danger">*</span>Número</label>
            <div class="col-md-10">
                <input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />
                <span class="text-danger"><?php echo form_error('numero'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label for="bairro" class="col-md-2 control-label"><span class="text-danger">*</span>Bairro</label>
            <div class="col-md-10">
                <input type="text" name="bairro" value="<?php echo $this->input->post('bairro'); ?>" class="form-control" id="bairro" />
                <span class="text-danger"><?php echo form_error('bairro'); ?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="cep" class="col-md-2 control-label"><span class="text-danger">*</span>Cep</label>
            <div class="col-md-10">
                <input type="text" name="cep" value="<?php echo $this->input->post('cep'); ?>" class="form-control" id="cep" />
                <span class="text-danger"><?php echo form_error('cep'); ?></span>
            </div>
        </div>

        <div class="form-group">
            <label for="referencia" class="col-md-2 control-label">Referência</label>
            <div class="col-md-10">
                <input type="text" name="referencia" value="<?php echo $this->input->post('referencia'); ?>" class="form-control" id="referencia" />
                <span class="text-danger"><?php echo form_error('referencia'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label for="complemento" class="col-md-2 control-label">Complemento</label>
            <div class="col-md-10">
                <input type="text" name="complemento" value="<?php echo $this->input->post('complemento'); ?>" class="form-control" id="complemento" />
                <span class="text-danger"><?php echo form_error('complemento'); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label for="cidade" class="col-md-2 control-label"><span class="text-danger">*</span>Cidade</label>
            <div class="col-md-10">
                <input type="text" name="cidade" value="<?php echo $this->input->post('cidade'); ?>" class="form-control" id="cidade" />
                <span class="text-danger"><?php echo form_error('cidade'); ?></span>
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