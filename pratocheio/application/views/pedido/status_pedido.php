<div class="row-fluid">
    <h1>Dados do Cliente</h1>

    <table class="table table-striped table-bordered">
        <tr><td> Nome:</td>
            <td><?php echo $cliente['nome'] ?></td></tr>
        <tr><td>E-mail:</td>
            <td><?php echo $cliente['email'] ?></td></tr>

        <tr><td>Telefone:</td>
            <td>
                <?php echo $cliente['telefone'] ?>
            </td>
        </tr>    
    </table>
    <h1>Itens do Pedido</h1>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Nome</th>                
            <th>Quantidade</th>
            <th>Observações</th>
            <th>Valor Unitário</th>
            <th>Valor Total</th>

        </tr>
        <?php $valorTotal = 0; ?>
        <?php foreach ($itens_pedido as $item) { ?>
        <tr>
            <td><?php echo $item['nome_produto']; ?></td>
            <td><?php echo $item['quantidade'] ?></td>
            <td><?php echo (!empty($item['observacoes'])) ? $item['observacoes']: 'nenhuma' ?></td>
            <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
            <td>R$ <?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?>
            </td>

        </tr>
        <?php $valorTotal = $valorTotal + ($item['preco'] * $item['quantidade']); ?>
        <?php } ?>
    </table>
    <h1>Valor e Entrega</h1>

    <table class="table table-striped table-bordered">
        <tr><td> Valor Total:</td>
            <td><?php echo number_format($valorTotal, 2, ',', '.') ?></td></tr>
        <tr><td>Troco:</td>
            <td><?php echo number_format($pedido['troco'], 2, ',', '.') ?></td></tr>

        <tr><td> Tipo de Pagamento:</td>
            <td>
                <?php echo $tipo_pagamento ?>
            </td>
        </tr>    
        <tr><td> Tipo Entrega:</td>
            <td>
                <?php echo $tipoEntrega ?>
            </td>
        </tr>
        <tr><td>Endereço Entrega:</td>
            <td><?php echo $endereco['rua'] . ',' . $endereco['numero'] ?><br/>
                <?php
                echo (!empty($endereco['complemento'])) ? $endereco['complemento'] . ' - ' : '';
                echo $endereco['bairro']
                ?><br/>
                <?php echo $endereco['cidade'] . ' - ' . $endereco['cep'] ?><br/></td>
        </tr>
        <tr>
            <td>Data/Hora do pedido:</td>
            <td><?php echo dataBR($pedido['dataHora'], 'dh'); ?>
            </td>
        </tr>
        <tr>
            <td>
                Situação do Pedido
            </td>
            <td>
                <?php echo $statusAndamento ?> 
            </td>
        </tr>
        <?php if ($podeAtualizar): ?>
        <tr>
            <td>
                Atualizar situação
            </td>
            <td>
                <?php if ($pedido['statusAndamento'] != 'P'): ?>
                    <a href="<?php echo site_url('pedido/atualizar_status/P/' . $pedido['id_pedido']); ?>" class="btn btn-info btn-xs">Em preparo</a>
                <?php endif; ?>
                <?php if ($pedido['statusAndamento'] != 'S'): ?>
                    <a href="<?php echo site_url('pedido/atualizar_status/S/' . $pedido['id_pedido']); ?>" class="btn btn-primary btn-xs">Saiu para Entrega</a>
                <?php endif; ?>
                <?php if ($pedido['statusAndamento'] != 'E'): ?>
                    <a href="<?php echo site_url('pedido/atualizar_status/E/' . $pedido['id_pedido']); ?>" class="btn btn-success btn-xs">Entregue</a>
                <?php endif; ?>
                <?php if ($pedido['statusAndamento'] != 'C'): ?>
                    <a href="<?php echo site_url('pedido/atualizar_status/C/' . $pedido['id_pedido']); ?>" class="btn btn-danger btn-xs">Cancelado</a>
                <?php endif; ?>
                
            </td>
        </tr>
        <?php endif; ?>

    </table>
    <p align="center">
        <a href="javascript:history.go(-1)" class="btn btn-danger">Voltar</a>
    </p>
</div>