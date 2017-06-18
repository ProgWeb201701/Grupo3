<?php echo form_open('funcionario/edit/'.$funcionario['id_login'],array("class"=>"form-horizontal")); ?>

<div class="col-sm-9 ">
    <h1>Editar Cadastro de Funcionários</h1>
     <HR SIZE="2">
    <br/>

	<div class="form-group">
		<label for="nome" class="col-md-2 control-label"><span class="text-danger">*</span>Nome</label>
		<div class="col-md-10">
			<input type="text" name="nome" value="<?php echo ($this->input->post('nome') ? $this->input->post('nome') : $funcionario['nome']); ?>" class="form-control" id="nome" />
			<span class="text-danger"><?php echo form_error('nome');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="usuario" class="col-md-2 control-label"><span class="text-danger">*</span>Usuario</label>
		<div class="col-md-10">
			<input type="text" name="usuario" value="<?php echo ($this->input->post('usuario') ? $this->input->post('usuario') : $funcionario['usuario']); ?>" class="form-control" id="usuario" />
			<span class="text-danger"><?php echo form_error('usuario');?></span>
		</div>
	</div>
    
    <div class="form-group">
		<label for="senha" class="col-md-2 control-label"><span class="text-danger">*</span>Senha</label>
		<div class="col-md-10">
			<input type="text" name="senha" value="<?php echo ($this->input->post('senha') ? $this->input->post('senha') : $funcionario['senha']); ?>" class="form-control" id="senha" />
			<span class="text-danger"><?php echo form_error('senha');?></span>
		</div>
	</div>
	
	
	<div class="form-group">
		<div class="col-sm-offset-6 col-sm-6">
			<button type="submit" class="btn btn-success">Salvar</button>
        </div>
	</div>
	
<?php echo form_close(); ?>
</div>
	