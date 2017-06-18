<div class="pull-right">
	<a href="<?php echo site_url('funcionario/adicionar'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		
		<th>Nome</th>
		<th>Usuário</th>
		<th>Ações</th>
    </tr>
	<?php foreach($funcionarios as $f){ ?>
    <tr>
		<td><?php echo $f['id_login']; ?></td>
		<td><?php echo $f['usuario']; ?></td>
		<td><?php echo $f['nome']; ?></td>
		<td>
            <a href="<?php echo site_url('funcionario/editar/'.$f['id_login']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('funcionario/remover/'.$f['id_login']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>