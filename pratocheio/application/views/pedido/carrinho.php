<div class="row-fluid">
    <?php echo form_open('pedido/fechar') ?>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Nome</th>                
            <th>Quantidade</th>
            <th>Observações</th>
            <th>Valor Unitário</th>
            <th>Valor Total</th>
            <th>Ações</th>
        </tr>
        <?php $valorTotal = 0; ?>
        <?php foreach ($itens_pedido as $item) { ?>
            <tr>
                <td><input type="hidden" name="id_produto[]" 
                           value="<?php echo $item['dados']['id_produto']; ?>">
                           <?php echo $item['dados']['nome_produto']; ?>
                </td>
                <td><input size="3"  maxlength="3" 
                           type="text" readonly="readonly" 
                           name="quantidade[]" 
                           value="<?php echo $item['quantidade'] ?>"/> 
                    <a title="Aumentar" href="<?php echo site_url('pedido/aumenta_quantidade/' . $item['indice']); ?>" class="btn btn-success btn-xs">+</a>
                    <a title="Diminuir" href="<?php echo site_url('pedido/diminui_quantidade/' . $item['indice']); ?>" class="btn btn-danger btn-xs">-</a>
                </td>
                <td><textarea name="observacoes[]" rows="3" cols="20"></textarea></td>
                <td>R$ <?php echo number_format($item['dados']['preco'], 2, ',', '.'); ?></td>
                <td>R$ <?php echo number_format($item['dados']['preco'] * $item['quantidade'], 2, ',', '.') ?>
                    <input type="hidden" name="valor[]" value="<?php echo number_format($item['dados']['preco'] * $item['quantidade'], 2) ?>"/>
                </td>
                <td>
                    <a href="<?php echo site_url('pedido/remover_item/' . $item['indice']); ?>" class="btn btn-danger btn-xs">Remover</a>
                </td>
            </tr>
            <?php $valorTotal = $valorTotal + ($item['dados']['preco'] * $item['quantidade']); ?>
        <?php } ?>
    </table>
    <table class="table table-striped table-bordered">
        <tr><td><span class="text-danger">*</span> Valor Total:</td>
            <td><input type="number" name="valor_total" value="<?php echo number_format($valorTotal, 2) ?>" readonly="readonly"/></td></tr>
        <tr><td>Troco:</td>
            <td><input type="number" step=".01" name="troco"/></td></tr>

        <tr><td><span class="text-danger">*</span> Tipo de Pagamento:</td>
            <td><select name="tipo_pagamento">
                    <option value="D">Dinheiro</option>
                    <option value="C">Cartão</option>
                </select></td>
        </tr>    
        <tr><td><span class="text-danger">*</span> Tipo Entrega:</td>
            <td><select name="tipoEntrega">
                    <option value="E">Entrega em Domicílio</option>
                    <option value="B">Busca no Delivery</option>
                </select></td>
        </tr>
        <tr><td>Endereço Entrega:</td>
            <td><?php echo $endereco['rua'] . ',' . $endereco['numero'] ?><br/>
                <?php echo (!empty($endereco['complemento'])) ? $endereco['complemento'] . ' - ' : '';
                echo $endereco['bairro']
                ?><br/>
<?php echo $endereco['cidade'] . ' - ' . $endereco['cep'] ?><br/></td>
        </tr>
        <tr><td>Data/Hora do pedido:</td>
            <td><?php echo date('d/m/Y H:i') ?>
                <input type="hidden" id="data_hora" value="<?php echo date('d/m/Y H:i') ?>"/></td>
        </tr>
        <input type="hidden" name="id_cliente" value="<?php echo $this->session->userdata('id_cliente') ?>"/>

    </table>

    <div class="pull-right">
        <a href="<?php echo site_url(); ?>" class="btn btn-primary btn-xs">Continuar comprando </a> 
        <button type="submit" class="btn btn-success btn-xs">Fechar o Pedido</button> 	
    </div>
</div>
<?php
form_close();
