<?php
$nome_modulo = "Clube";
$modulo = "clube";

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
  'nome' => array(
          'legenda' => 'Nome',
          'tipo' => 'text',
          'chave' => 0,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 1
      ),
  'simbolo' => array(
          'legenda' => 'Imagem',
          'tipo' => 'file',
          'chave' => 0,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 1
      ),
  'ligaId' => array(
          'legenda' => 'Liga',
          'tipo' => 'select',
          'carrega_opcoes' => array(
                    'tabela' => 'liga', 
                    'chave' => 'id', 
                    'legenda' => 'nome', 
                    'ativo' => null,
                    'null' => '1',
                    'null_legenda' => 'Selecione uma liga!',
                    'null_valor' => 0,
                    'null_valor_legenda' => '---'
                ),
          'chave' => 0,
          'listagem' => 1,
          'inserir' => 1,
          'editar' => 1
      ),
      
      'badges_permitidos' => array(
          'legenda' => 'Badges',
          'tipo' => 'select_multiple',
          'inserir' => 1, 
          'editar' => 1,
          'listagem' => 1
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