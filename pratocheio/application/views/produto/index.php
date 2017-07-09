<div class="row-fluid">
    <h1><?= $titulo_pagina ?></h1>
    <HR SIZE="2">
    <br/>
    <div class="pull-right">
        <a href="<?php echo site_url('produto/adicionar'); ?>" class="btn btn-success">Adicionar</a> 
    </div>

    <table class="table table-striped table-bordered">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Preço (R$)</th>
            <th>Descrição</th>
            <th>Foto</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($produtos as $p) { ?>
            <?php $linkFoto = (!isset($p['foto'])) ? '(sem foto)' :
                    '<a href="' . base_url('produto/ver_foto/' . $p['id_produto']) . '" class="btn btn-info btn-xs">Ver Foto</a>';
            ?>

            <tr>
                <td><?php echo $p['id_produto']; ?></td>
                <td><?php echo $p['nome_produto']; ?></td>
                <td><?php echo number_format($p['preco'], 2, ',', '.'); ?></td>
                <td><?php echo $p['descri']; ?></td>
                <td><?php echo $linkFoto; ?></td>
                <td>
                    <a href="<?php echo site_url('produto/editar/' . $p['id_produto']); ?>" class="btn btn-info btn-xs">Editar</a> 
                    <a href="<?php echo site_url('produto/remover/' . $p['id_produto']); ?>" class="btn btn-danger btn-xs">Remover</a>
                </td>
            </tr>
<?php } ?>
    </table>
    <div class="pull-right">
<?php echo $this->pagination->create_links(); ?>    
    </div>
</div>