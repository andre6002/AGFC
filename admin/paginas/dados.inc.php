<?php
$nome_modulo = "Páginas";
$modulo = "paginas";

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

    'nome' => array(
        'legenda' => 'Nome',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'largura' => 50
    ),

    'titulo' => array(
        'legenda' => 'Título',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'largura' => 50
    ),

    'texto' => array(
        'legenda' => 'Texto',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'largura' => 50
    ),
    
    'link' => array(
        'legenda' => 'Link',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'largura' => 50
    ),
    'imagem' => array(
        'legenda' => 'Imagem',
        'tipo' => 'file',
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
