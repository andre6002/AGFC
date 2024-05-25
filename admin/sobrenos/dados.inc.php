<?php
$nome_modulo = "Sobre Nós";
$modulo = "sobrenos";

$arrCampos = array(
    'id' => array(
        'legenda' => 'ID',
        'tipo' => 'int',
        'chave' => 1,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 0,
        'largura' => 50
    ),
    'titulo' => array(
        'legenda' => 'Título',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'paragrafo1' => array(
        'legenda' => '1º Parágrafo',
        'tipo' => 'textarea',
        'chave' => 0,
        'listagem' => 0,
        'inserir' => 1,
        'editar' => 1
    ),
    'imagem' => array(
        'legenda' => 'Imagem de Destaque',
        'tipo' => 'file',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'paragrafo2' => array(
        'legenda' => '2º Parágrafo',
        'tipo' => 'textarea',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'subtitulo' => array(
        'legenda' => 'Subtítulo',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'paragrafo3' => array(
        'legenda' => '3º Parágrafo',
        'tipo' => 'textarea',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),

    'ativo' => array(
        'legenda' => 'Ativo',
        'tipo' => 'checkbox',
        'opcoes' => array(
            '0' => 'Não',
            '1' => 'Sim'
        ),
        /*'carrega_opcoes' => array(
                              'tabela' => 'menu', 
                              'chave' => 'id', 
                              'legenda' => 'nome', 
                              'ativo' => 'ativo'
                          ),*/
        'default' => '0',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'largura' => 50
    )
);
