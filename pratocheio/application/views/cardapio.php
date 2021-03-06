<!-- Incompleto 
Cardápio 
Com foto nome do prato, valor, quantidade e forma de seleção
Botão fechar pedido

Quando clica no fechar exibe tela (tabela com produtos) do pedido com ações de excluir produtos do pedido e botão finalizar pedido.
-->
<div class = "row-fluid">
    <?php if ($produtos): ?>
        <?php foreach ($produtos as $p): ?>
            <div class = "col-xs-8 col-xs-4">
                <p><b><?php echo $p['nome_produto'] ?></b></p>
                <div  class = "thumbnail">
                    <?php if (isset($p['foto'])): ?>
                        <img src ="<?php echo base_url($p['foto']) ?>" alt = "<?php echo $p['nome_produto'] ?>"
                             width="50%" height="50%"/>
                         <?php else: ?>
                        
                            <img src ="<?php echo base_url('./assets/foto_padrao.png') ?>" alt = "<?php echo $p['nome_produto'] ?>"  
                                 width="50%" height="50%" />
                       
                    <?php endif; ?> 
                </div>
                <p><?php echo $p['descri'] ?></p>
                <p><b>Valor:</b> R$ <?php echo number_format($p['preco'], 2, ',', '.') ?></p>
                <?php if ($this->session->userdata('tipo_login') != 'F'): ?>
                    <p><a href="<?php echo base_url('pedido/adicionar_carrinho/' . $p['id_produto']) ?>" class="btn btn-success btn-xs">Adicionar ao Pedido</a></p>
                <?php endif; ?> 
            </div>
    
        <?php endforeach; ?>
    <?php else: ?>
        <p align="center">Não há produtos cadastrados para mostrar.</p>
        <p align="center">Cadastre os produtos para que eles sejam exibidos aqui.</p>
    <?php endif; ?>
</div>
<div class="row"></div>