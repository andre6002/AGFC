<?php
$nome_modulo = "Administradores";
$modulo = "admins";

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
  'username' => array(
    'legenda' => 'Username',
    'tipo' => 'text',
    'chave' => 0,
    'listagem' => 1,
    'inserir' => 1,
    'editar' => 1
  ),

  'password' => array(
    'legenda' => 'Password',
    'tipo' => 'password',
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
