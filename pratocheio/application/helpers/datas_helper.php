<?php

/**
 * Converte data brasileira pra padrao mySql
 */
function dataSQL($databr, $hora = "d") {
    if ($databr <> '') {
        $data = explode("/", "$databr");
        $d    = $data[0];
        $m    = $data[1];
        $y    = substr($data[2], 0, 4);
        $h    = substr($data[2], 5, 8);

        // verifica se a data é válida!
        // 1 = true (válida)
        // 0 = false (inválida)
        $res = checkdate($m, $d, $y);
        if ($res == 1) {
            $novadata = "$y-$m-$d";
        } else {
            $novadata = null;
        }
    } else {
        $novadata = null;
    }

    if ($hora == 'd') {
        return $novadata;
    } elseif ($hora == 'dh') {
        $novadata = $novadata . ' ' . $h;
    } if ($hora == 'h') {
        $novadata = $h;
    }
    return $novadata;
}

/**
 * Recebe a data em formato SQL e devolve em formato brasileiro.
 * 
 */
function dataBR($dataSQL, $hora = 'd') {
    if ($dataSQL <> '') {
        $data = explode("-", "$dataSQL");
        $d    = substr($data[2], 0, 2);
        $m    = $data[1];
        $y    = $data[0];
        $h    = substr($data[2], 2, 9);
        $res  = checkdate($m, $d, $y);

        if ($res == 1) {
            $novaData = "$d/$m/$y";
        } else {
            $novaData = "";
        }
    } else {
        $novaData = "";
    }
    if ($hora == 'd') {
        return $novaData;
    } elseif ($hora == 'dh') {
        return $novaData . $h;
    } if
    ($hora == 'h') {
        return $h;
    }
}
