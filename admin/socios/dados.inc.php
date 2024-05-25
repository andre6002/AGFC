<?php
$nome_modulo = "Sócios";
$modulo = "socios";

$arrCampos = array(
    'codSocio' => array(
        'legenda' => 'Código do Sócio',
        'tipo' => 'int',
        'chave' => 1,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 0,
        'largura' => 50
    ),
    'nomeSocio' => array(
        'legenda' => 'Nome do Sócio',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'CC' => array(
        'legenda' => 'CC',
        'tipo' => 'number',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'NIF' => array(
        'legenda' => 'NIF',
        'tipo' => 'number',
        'chave' => 0,
        'listagem' => 0,
        'inserir' => 1,
        'editar' => 1
    ),
    'Email' => array(
        'legenda' => 'E-mail',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'N_Telemovel' => array(
        'legenda' => 'Nº de Telemóvel',
        'tipo' => 'text',
        'chave' => 0,
        'listagem' => 0,
        'inserir' => 1,
        'editar' => 1
    ),
    'dataNasc' => array(
        'legenda' => 'Data de Nascimento',
        'tipo' => 'date',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'fotoSocio' => array(
        'legenda' => 'Foto',
        'tipo' => 'file',
        'chave' => 0,
        'listagem' => 0,
        'inserir' => 1,
        'editar' => 1
    ),
    'sexo' => array(
        'legenda' => 'Sexo',
        'tipo' => 'select',
        'opcoes' => array(
            'M' => 'Masculino',
            'F' => 'Feminino'
        ),
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1
    ),
    'codLocal' => array(
        'legenda' => 'Localidades',
        'tipo' => 'select',
        'carrega_opcoes' => array(
            'tabela' => 'localidades',
            'chave' => 'id',
            'legenda' => 'nome',
            'ativo' => null,
            'null' => '1',
            'null_legenda' => 'Selecione um local!',
            'null_valor' => 0,
            'null_valor_legenda' => '---'
        ),
        'chave' => 0,
        'listagem' => 0,
        'inserir' => 1,
        'editar' => 1
    )
);
