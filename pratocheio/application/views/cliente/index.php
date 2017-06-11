<div class="pull-right">
	<a href="<?php echo site_url('cliente/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Cliente</th>
		<th>Senha</th>
		<th>Email</th>
		<th>Nome</th>
		<th>Telefone</th>
		<th>Dt Nasc</th>
		<th>Actions</th>
    </tr>
	<?php foreach($clientes as $c){ ?>
    <tr>
		<td><?php echo $c['id_cliente']; ?></td>
		<td><?php echo $c['senha']; ?></td>
		<td><?php echo $c['email']; ?></td>
		<td><?php echo $c['nome']; ?></td>
		<td><?php echo $c['telefone']; ?></td>
		<td><?php echo $c['dt_nasc']; ?></td>
		<td>
            <a href="<?php echo site_url('cliente/edit/'.$c['id_cliente']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('cliente/remove/'.$c['id_cliente']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
