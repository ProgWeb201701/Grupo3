<?php echo form_open('endereco/editar/'.$endereco['id_endereco'],array("class"=>"form-horizontal")); ?>

<div class="col-sm-9 ">
    <h1>Editar Cadastro de Endereço</h1>
     <HR SIZE="2">
    <br/>

	<div class="form-group">
		<label for="id_cliente" class="col-md-2 control-label"><span class="text-danger">*</span>Cliente</label>
		<div class="col-md-10">
			<select name="id_cliente" class="form-control">
				<option value="">select cliente</option>
				<?php 
				foreach($all_clientes as $cliente)
				{
					$selected = ($cliente['id_cliente'] == $endereco['id_cliente']) ? ' selected="selected"' : "";

					echo '<option value="'.$cliente['id_cliente'].'" '.$selected.'>'.$cliente['nome'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_cliente');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="referencia" class="col-md-2 control-label">Referencia</label>
		<div class="col-md-10">
			<input type="text" name="referencia" value="<?php echo ($this->input->post('referencia') ? $this->input->post('referencia') : $endereco['referencia']); ?>" class="form-control" id="referencia" />
			<span class="text-danger"><?php echo form_error('referencia');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="complemento" class="col-md-2 control-label">Complemento</label>
		<div class="col-md-10">
			<input type="text" name="complemento" value="<?php echo ($this->input->post('complemento') ? $this->input->post('complemento') : $endereco['complemento']); ?>" class="form-control" id="complemento" />
			<span class="text-danger"><?php echo form_error('complemento');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="cidade" class="col-md-2 control-label"><span class="text-danger">*</span>Cidade</label>
		<div class="col-md-10">
			<input type="text" name="cidade" value="<?php echo ($this->input->post('cidade') ? $this->input->post('cidade') : $endereco['cidade']); ?>" class="form-control" id="cidade" />
			<span class="text-danger"><?php echo form_error('cidade');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="numero" class="col-md-2 control-label"><span class="text-danger">*</span>Numero</label>
		<div class="col-md-10">
			<input type="text" name="numero" value="<?php echo ($this->input->post('numero') ? $this->input->post('numero') : $endereco['numero']); ?>" class="form-control" id="numero" />
			<span class="text-danger"><?php echo form_error('numero');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="bairro" class="col-md-2 control-label"><span class="text-danger">*</span>Bairro</label>
		<div class="col-md-10">
			<input type="text" name="bairro" value="<?php echo ($this->input->post('bairro') ? $this->input->post('bairro') : $endereco['bairro']); ?>" class="form-control" id="bairro" />
			<span class="text-danger"><?php echo form_error('bairro');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="rua" class="col-md-2 control-label"><span class="text-danger">*</span>Rua</label>
		<div class="col-md-10">
			<input type="text" name="rua" value="<?php echo ($this->input->post('rua') ? $this->input->post('rua') : $endereco['rua']); ?>" class="form-control" id="rua" />
			<span class="text-danger"><?php echo form_error('rua');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="cep" class="col-md-2 control-label"><span class="text-danger">*</span>Cep</label>
		<div class="col-md-10">
			<input type="text" name="cep" value="<?php echo ($this->input->post('cep') ? $this->input->post('cep') : $endereco['cep']); ?>" class="form-control" id="cep" />
			<span class="text-danger"><?php echo form_error('cep');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-6 col-sm-6">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>

    </div>