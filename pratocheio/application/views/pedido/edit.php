<?php echo form_open('pedido/edit/'.$pedido['id_pedido'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="id_cliente" class="col-md-4 control-label"><span class="text-danger">*</span>Cliente</label>
		<div class="col-md-8">
			<select name="id_cliente" class="form-control">
				<option value="">select cliente</option>
				<?php 
				foreach($all_clientes as $cliente)
				{
					$selected = ($cliente['id_cliente'] == $pedido['id_cliente']) ? ' selected="selected"' : "";

					echo '<option value="'.$cliente['id_cliente'].'" '.$selected.'>'.$cliente['nome'].'</option>';
				} 
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_cliente');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="valor_total" class="col-md-4 control-label"><span class="text-danger">*</span>Valor Total</label>
		<div class="col-md-8">
			<input type="text" name="valor_total" value="<?php echo ($this->input->post('valor_total') ? $this->input->post('valor_total') : $pedido['valor_total']); ?>" class="form-control" id="valor_total" />
			<span class="text-danger"><?php echo form_error('valor_total');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="tipo_pagamento" class="col-md-4 control-label"><span class="text-danger">*</span>Tipo Pagamento</label>
		<div class="col-md-8">
			<input type="text" name="tipo_pagamento" value="<?php echo ($this->input->post('tipo_pagamento') ? $this->input->post('tipo_pagamento') : $pedido['tipo_pagamento']); ?>" class="form-control" id="tipo_pagamento" />
			<span class="text-danger"><?php echo form_error('tipo_pagamento');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="dataHora" class="col-md-4 control-label"><span class="text-danger">*</span>DataHora</label>
		<div class="col-md-8">
			<input type="text" name="dataHora" value="<?php echo ($this->input->post('dataHora') ? $this->input->post('dataHora') : $pedido['dataHora']); ?>" class="form-control" id="dataHora" />
			<span class="text-danger"><?php echo form_error('dataHora');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="troco" class="col-md-4 control-label">Troco</label>
		<div class="col-md-8">
			<input type="text" name="troco" value="<?php echo ($this->input->post('troco') ? $this->input->post('troco') : $pedido['troco']); ?>" class="form-control" id="troco" />
			<span class="text-danger"><?php echo form_error('troco');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="previsaoEntrega" class="col-md-4 control-label"><span class="text-danger">*</span>PrevisaoEntrega</label>
		<div class="col-md-8">
			<input type="text" name="previsaoEntrega" value="<?php echo ($this->input->post('previsaoEntrega') ? $this->input->post('previsaoEntrega') : $pedido['previsaoEntrega']); ?>" class="form-control" id="previsaoEntrega" />
			<span class="text-danger"><?php echo form_error('previsaoEntrega');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="statusAndamento" class="col-md-4 control-label"><span class="text-danger">*</span>StatusAndamento</label>
		<div class="col-md-8">
			<input type="text" name="statusAndamento" value="<?php echo ($this->input->post('statusAndamento') ? $this->input->post('statusAndamento') : $pedido['statusAndamento']); ?>" class="form-control" id="statusAndamento" />
			<span class="text-danger"><?php echo form_error('statusAndamento');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="tipoEntrega" class="col-md-4 control-label"><span class="text-danger">*</span>TipoEntrega</label>
		<div class="col-md-8">
			<input type="text" name="tipoEntrega" value="<?php echo ($this->input->post('tipoEntrega') ? $this->input->post('tipoEntrega') : $pedido['tipoEntrega']); ?>" class="form-control" id="tipoEntrega" />
			<span class="text-danger"><?php echo form_error('tipoEntrega');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>