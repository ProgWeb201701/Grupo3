<?php echo form_open('produto/edit/'.$produto['id_produto'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nome_produto" class="col-md-4 control-label"><span class="text-danger">*</span>Nome Produto</label>
		<div class="col-md-8">
			<input type="text" name="nome_produto" value="<?php echo ($this->input->post('nome_produto') ? $this->input->post('nome_produto') : $produto['nome_produto']); ?>" class="form-control" id="nome_produto" />
			<span class="text-danger"><?php echo form_error('nome_produto');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="preco" class="col-md-4 control-label"><span class="text-danger">*</span>Preco</label>
		<div class="col-md-8">
			<input type="text" name="preco" value="<?php echo ($this->input->post('preco') ? $this->input->post('preco') : $produto['preco']); ?>" class="form-control" id="preco" />
			<span class="text-danger"><?php echo form_error('preco');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="descri" class="col-md-4 control-label"><span class="text-danger">*</span>Descri</label>
		<div class="col-md-8">
			<input type="text" name="descri" value="<?php echo ($this->input->post('descri') ? $this->input->post('descri') : $produto['descri']); ?>" class="form-control" id="descri" />
			<span class="text-danger"><?php echo form_error('descri');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="foto" class="col-md-4 control-label">Foto</label>
		<div class="col-md-8">
			<input type="text" name="foto" value="<?php echo ($this->input->post('foto') ? $this->input->post('foto') : $produto['foto']); ?>" class="form-control" id="foto" />
			<span class="text-danger"><?php echo form_error('foto');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>