<?php
$nome_modulo = "Notícias";
$modulo = "noticias";

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
    'conteudo' => array(
        'legenda' => 'Conteúdo',
        'tipo' => 'textarea',
        'chave' => 0,
        'listagem' => 0,
        'inserir' => 1,
        'editar' => 1
    ),
    'autor' => array(
        'legenda' => 'Autor',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'data_publicacao' => array(
        'legenda' => 'Data de Publicação',
        'tipo' => 'date',
        'chave' => 0,
        'listagem' => 1,
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
    'resumo' => array(
        'legenda' => 'Resumo',
        'tipo' => 'textarea',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),

    'link' => array(
        'legenda' => 'Link',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 0,
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
