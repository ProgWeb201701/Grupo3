<div class="pull-right">
	<a href="<?php echo site_url('cliente/adicionar'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Código</th>
		<th>Email</th>
		<th>Nome</th>
		<th>Telefone</th>
		<th>Data Nascimento</th>
		<th>Ações</th>
    </tr>
	<?php foreach($clientes as $c){ ?>
    <tr>
		<td><?php echo $c['id_cliente']; ?></td>
		<td><?php echo $c['email']; ?></td>
		<td><?php echo $c['nome']; ?></td>
		<td><?php echo $c['telefone']; ?></td>
		<td><?php echo $c['dt_nasc']; ?></td>
		<td>
            <a href="<?php echo site_url('cliente/editar/'.$c['id_cliente']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('cliente/remover/'.$c['id_cliente']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
