<?php
$nome_modulo = "Stock";
$modulo = "stocks";

$arrCampos = array(
  'id' => array(
          'legenda' => 'Nome',
          'tipo' => 'select',
          'carrega_opcoes' => array(
                'tabela' => 'socio', 
                'chave' => 'id', 
                'legenda' => 'nome', 
                'ativo' => 'ativo',
                'null' => '1',
                'null_legenda' => 'Selecione um socio',
                'null_valor' => '0',
                'null_valor_legenda' => '---'
            ),
          'chave' => 1,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 0
      ),
  
  'S' => array(
          'legenda' => 'S',
          'tipo' => 'number',
          'chave' => 0,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 1
      ),
  
  'M' => array(
          'legenda' => 'M',
          'tipo' => 'number',
          'chave' => 0,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 1
      ),
  
  'L' => array(
          'legenda' => 'L',
          'tipo' => 'number',
          'chave' => 0,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 1
      ),
  
  'XL' => array(
          'legenda' => 'XL',
          'tipo' => 'number',
          'chave' => 0,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 1
      ),
);
