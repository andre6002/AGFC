<?php
$nome_modulo = "Personalização Predefinida";
$modulo = "personalizacaopredefinida";

$arrCampos = array(
  'id' => array(
          'legenda' => 'ID',
          'tipo' => 'text',
          'chave' => 1,
          'listagem' => 0,
          'inserir' => 0,
          'editar' => 0,
          'largura' => 50
      ),
  'socio_id' => array(
          'legenda' => 'socio',
          'tipo' => 'select',
          'carrega_opcoes' => array(
                    'tabela' => 'socio', 
                    'chave' => 'id', 
                    'legenda' => 'nome', 
                    'ativo' => null,
                    'null' => '1',
                    'null_legenda' => 'Selecione um socio!',
                    'null_valor' => 0,
                    'null_valor_legenda' => '---'
                ),
          'chave' => 0,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 1
      ),
  'nomeJogador' => array(
          'legenda' => 'Nome do Jogador',
          'tipo' => 'text',
          'chave' => 0,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 1
      ),
  'numeroJogador' => array(
          'legenda' => 'Nº do Jogador',
          'tipo' => 'number',
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
      ),
);
?>