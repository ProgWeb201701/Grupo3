<?php echo form_open('itempedido/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_produto" class="col-md-4 control-label"><span class="text-danger">*</span>Produto</label>
		<div class="col-md-8">
			<select name="id_produto" class="form-control">
				<option value="">select produto</option>
				<?php 
				foreach($all_produtos as $produto)
				{
					$selected = ($produto['id_produto'] == $this->input->post('id_produto')) ? ' selected="selected"' : "";

					echo '<option value="'.$produto['id_produto'].'" '.$selected.'>'.$produto['nome_produto'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_produto');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="valor" class="col-md-4 control-label"><span class="text-danger">*</span>Valor</label>
		<div class="col-md-8">
			<input type="text" name="valor" value="<?php echo $this->input->post('valor'); ?>" class="form-control" id="valor" />
			<span class="text-danger"><?php echo form_error('valor');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="quantidade" class="col-md-4 control-label"><span class="text-danger">*</span>Quantidade</label>
		<div class="col-md-8">
			<input type="text" name="quantidade" value="<?php echo $this->input->post('quantidade'); ?>" class="form-control" id="quantidade" />
			<span class="text-danger"><?php echo form_error('quantidade');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="observacoes" class="col-md-4 control-label">Observacoes</label>
		<div class="col-md-8">
			<input type="text" name="observacoes" value="<?php echo $this->input->post('observacoes'); ?>" class="form-control" id="observacoes" />
			<span class="text-danger"><?php echo form_error('observacoes');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="id_pedido" class="col-md-4 control-label"><span class="text-danger">*</span>Id Pedido</label>
		<div class="col-md-8">
			<input type="text" name="id_pedido" value="<?php echo $this->input->post('id_pedido'); ?>" class="form-control" id="id_pedido" />
			<span class="text-danger"><?php echo form_error('id_pedido');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>