<?php
$nome_modulo = "Quotas";
$modulo = "quotas";

$arrCampos = array(
    'codQuota' => array(
        'legenda' => 'Código da Quota',
        'tipo' => 'int',
        'chave' => 1,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 0,
        'largura' => 50
    ),
    'tipo' => array(
        'legenda' => 'Tipo',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'idadeMin' => array(
        'legenda' => 'Idade Mínima',
        'tipo' => 'number',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'idadeMax' => array(
        'legenda' => 'Idade Máxima',
        'tipo' => 'number',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'cartao' => array(
        'legenda' => 'Cartão',
        'tipo' => 'float',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'quota' => array(
        'legenda' => 'Quota',
        'tipo' => 'float',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'inscricao' => array(
        'legenda' => 'Inscrição',
        'tipo' => 'float',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    )
);
