<div class="pull-right">
	<a href="<?php echo site_url('itempedido/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Item</th>
		<th>Id Produto</th>
		<th>Valor</th>
		<th>Quantidade</th>
		<th>Observacoes</th>
		<th>Id Pedido</th>
		<th>Actions</th>
    </tr>
	<?php foreach($itenspedido as $i){ ?>
    <tr>
		<td><?php echo $i['id_item']; ?></td>
		<td><?php echo $i['id_produto']; ?></td>
		<td><?php echo $i['valor']; ?></td>
		<td><?php echo $i['quantidade']; ?></td>
		<td><?php echo $i['observacoes']; ?></td>
		<td><?php echo $i['id_pedido']; ?></td>
		<td>
            <a href="<?php echo site_url('itempedido/edit/'.$i['id_item']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('itempedido/remove/'.$i['id_item']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
