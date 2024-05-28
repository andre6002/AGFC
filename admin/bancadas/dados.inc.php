<?php
$nome_modulo = "Bancadas";
$modulo = "bancadas";

$arrCampos = array(
    'codBancada' => array(
        'legenda' => 'Código da Bancada',
        'tipo' => 'int',
        'chave' => 1,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 0,
        'largura' => 50
    ),
    'nomeBancada' => array(
        'legenda' => 'Nome da Bancada',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'precoBancada' => array(
        'legenda' => 'Preço da Bancada',
        'tipo' => 'float',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'maxFilas' => array(
        'legenda' => 'Máximo de Filas',
        'tipo' => 'number',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'maxLugaresPorFila' => array(
        'legenda' => 'Máximo de Lugares por Fila',
        'tipo' => 'number',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    )
);
