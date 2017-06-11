<?php echo form_open('funcionario/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="senha" class="col-md-4 control-label"><span class="text-danger">*</span>Senha</label>
		<div class="col-md-8">
			<input type="text" name="senha" value="<?php echo $this->input->post('senha'); ?>" class="form-control" id="senha" />
			<span class="text-danger"><?php echo form_error('senha');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="usuario" class="col-md-4 control-label"><span class="text-danger">*</span>Usuario</label>
		<div class="col-md-8">
			<input type="text" name="usuario" value="<?php echo $this->input->post('usuario'); ?>" class="form-control" id="usuario" />
			<span class="text-danger"><?php echo form_error('usuario');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="nome" class="col-md-4 control-label"><span class="text-danger">*</span>Nome</label>
		<div class="col-md-8">
			<input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
			<span class="text-danger"><?php echo form_error('nome');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>