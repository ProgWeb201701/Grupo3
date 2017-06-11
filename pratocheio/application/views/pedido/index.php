<div class="pull-right">
	<a href="<?php echo site_url('pedido/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Pedido</th>
		<th>Id Cliente</th>
		<th>Valor Total</th>
		<th>Tipo Pagamento</th>
		<th>DataHora</th>
		<th>Troco</th>
		<th>PrevisaoEntrega</th>
		<th>StatusAndamento</th>
		<th>TipoEntrega</th>
		<th>Actions</th>
    </tr>
	<?php foreach($pedidos as $p){ ?>
    <tr>
		<td><?php echo $p['id_pedido']; ?></td>
		<td><?php echo $p['id_cliente']; ?></td>
		<td><?php echo $p['valor_total']; ?></td>
		<td><?php echo $p['tipo_pagamento']; ?></td>
		<td><?php echo $p['dataHora']; ?></td>
		<td><?php echo $p['troco']; ?></td>
		<td><?php echo $p['previsaoEntrega']; ?></td>
		<td><?php echo $p['statusAndamento']; ?></td>
		<td><?php echo $p['tipoEntrega']; ?></td>
		<td>
            <a href="<?php echo site_url('pedido/edit/'.$p['id_pedido']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('pedido/remove/'.$p['id_pedido']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
