<div class="row-fluid">
    <h1><?= $titulo_pagina ?></h1>
    <HR SIZE="2">
    <br/>

    <table class="table table-striped table-bordered">
        <tr>
            <th>Pedido</th>
            <th>Data/Hora</th>
            <th>Cliente</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Valor Total</th>
            <th>Situação</th>
            <th>Detalhes</th>
        </tr>
        <?php foreach ($pedidos as $p) { ?>
            <tr>
                <td><?php echo $p['id_pedido']; ?></td>
                <td><?php echo $p['dataHora']; ?></td>
                <td><?php echo $p['nome']; ?></td>
                <td><?php echo $p['email']; ?></td>
                <td><?php echo $p['telefone']; ?></td>
                <td><?php echo number_format($p['valor_total'], 2, ',', '.'); ?></td>
                <td><?php
                    switch ($p['statusAndamento']) {
                        case 'A': echo "Aguardando";
                            break;
                        case 'P': echo "Em preparo";
                            break;
                        case 'S': echo "Saiu para Entrega";
                            break;
                        case 'E': echo "Entregue";
                            break;
                        case 'C': echo "Cancelado";
                            break;
                    }
                    ?></td>
                <td>
                    <a href = "<?php echo site_url('pedido/status_pedido/' . $p['id_pedido']); ?>" class = "btn btn-info btn-xs">Detalhes do Pedido</a>
                </td>
            </tr>
        <?php }
        ?>
    </table>
    <div class="pull-right">
<?php echo $this->pagination->create_links(); ?>    
    </div>
</div>