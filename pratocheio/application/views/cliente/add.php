<?php echo form_open('cliente/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="senha" class="col-md-4 control-label"><span class="text-danger">*</span>Senha</label>
		<div class="col-md-8">
			<input type="password" name="senha" value="<?php echo $this->input->post('senha'); ?>" class="form-control" id="senha" />
			<span class="text-danger"><?php echo form_error('senha');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
			<span class="text-danger"><?php echo form_error('email');?></span>
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
		<label for="telefone" class="col-md-4 control-label"><span class="text-danger">*</span>Telefone</label>
		<div class="col-md-8">
			<input type="text" name="telefone" value="<?php echo $this->input->post('telefone'); ?>" class="form-control" id="telefone" />
			<span class="text-danger"><?php echo form_error('telefone');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="dt_nasc" class="col-md-4 control-label">Dt Nasc</label>
		<div class="col-md-8">
			<input type="text" name="dt_nasc" value="<?php echo $this->input->post('dt_nasc'); ?>" class="form-control" id="dt_nasc" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>