<?php
$nome_modulo = "Lugares Anuais";
$modulo = "lugar_anual";

$arrCampos = array(
    'codSocio1' => array(
        'legenda' => 'Sócio',
        'tipo' => 'select',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'carrega_opcoes' => array(
            'tabela' => 'socios',
            'chave' => 'codSocio',
            'legenda' => 'nomeSocio',
            'ativo' => null,
            'null' => '1',
            'null_legenda' => 'Selecione um sócio!',
            'null_valor' => 0,
            'null_valor_legenda' => '---'
        )
    ),
    'codLugarAnual' => array(
        'legenda' => 'Código do Lugar Anual',
        'tipo' => 'int',
        'chave' => 1,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 0,
        'largura' => 50
    ),
    'codBancada' => array(
        'legenda' => 'Bancada',
        'tipo' => 'select',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'carrega_opcoes' => array(
            'tabela' => 'bancadas',
            'chave' => 'codBancada',
            'legenda' => 'nomeBancada',
            'ativo' => null,
            'null' => '1',
            'null_legenda' => 'Selecione uma bancada!',
            'null_valor' => 0,
            'null_valor_legenda' => '---'
        )
    ),
    'fila' => array(
        'legenda' => 'Fila',
        'tipo' => 'hidden',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'numeroDoLugar' => array(
        'legenda' => 'Nº do Lugar',
        'tipo' => 'hidden',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    )
);
