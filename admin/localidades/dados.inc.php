<?php
$nome_modulo = "Localidades";
$modulo = "localidades";

$arrCampos = array(
    'codLocal' => array(
        'legenda' => 'Código da Localidade',
        'tipo' => 'int',
        'chave' => 1,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 0,
        'largura' => 50
    ),
    'nomeLocalidade' => array(
        'legenda' => 'Nome da Localidade',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'codPostal' => array(
        'legenda' => 'Código Postal',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    )
);
