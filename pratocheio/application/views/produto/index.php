<div class="pull-right">
	<a href="<?php echo site_url('produto/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Id Produto</th>
		<th>Nome Produto</th>
		<th>Preco</th>
		<th>Descri</th>
		<th>Foto</th>
		<th>Actions</th>
    </tr>
	<?php foreach($produtos as $p){ ?>
    <tr>
		<td><?php echo $p['id_produto']; ?></td>
		<td><?php echo $p['nome_produto']; ?></td>
		<td><?php echo $p['preco']; ?></td>
		<td><?php echo $p['descri']; ?></td>
		<td><?php echo $p['foto']; ?></td>
		<td>
            <a href="<?php echo site_url('produto/edit/'.$p['id_produto']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('produto/remove/'.$p['id_produto']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>    
</div>
