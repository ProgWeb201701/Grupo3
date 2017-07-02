<?php

function mostra_mensagem($mensagem, $linkVoltar=null) {
    $data['titulo_pagina'] = 'Erro';
    $data['corpo_pagina']  = 'mensagem.php';
    $data['mensagem']      = $mensagem;
    $data['voltar']        = $linkVoltar;
    
    $CI = &get_instance();
    $CI->load->view('includes/template.php', $data);
}
