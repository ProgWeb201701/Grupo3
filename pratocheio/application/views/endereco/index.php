<div class="pull-right">
	<a href="<?php echo site_url('endereco/adicionar'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Código</th>
		<th>Cliente</th>
		<th>Rua</th>
                <th>Numero</th>
                <th>Bairro</th>
		<th>Cep</th>
                <th>Cidade</th>
                <th>Referência</th>
		<th>Complemento</th>
		<th>Ações</th>
    </tr>
	<?php foreach($enderecos as $e){ ?>
    <tr>
		<td><?php echo $e['id_endereco']; ?></td>
		<td><?php echo $e['id_cliente']; ?></td>
		<td><?php echo $e['referencia']; ?></td>
		<td><?php echo $e['complemento']; ?></td>
		<td><?php echo $e['cidade']; ?></td>
		<td><?php echo $e['numero']; ?></td>
		<td><?php echo $e['bairro']; ?></td>
		<td><?php echo $e['rua']; ?></td>
		<td><?php echo $e['cep']; ?></td>
		<td>
            <a href="<?php echo site_url('endereco/editar/'.$e['id_endereco']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('endereco/remover/'.$e['id_endereco']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>