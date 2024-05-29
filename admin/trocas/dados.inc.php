<?php
$nome_modulo = "Troca de Lugar Anual";
$modulo = "trocas";

$arrCampos = array(
    'codTroca' => array(
        'legenda' => 'Código da Troca',
        'tipo' => 'int',
        'chave' => 1,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 0,
        'largura' => 50
    ),
    'codSocio1' => array(
        'legenda' => 'Sócio com Lugar Anual (Inicial)',
        'tipo' => 'select',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'carrega_opcoes' => array(
            'tabela' => 'lugar_anual',
            'chave' => 'codSocio1',
            'legenda' => 'codSocio1',
            'ativo' => null,
            'null' => '1',
            'null_legenda' => 'Selecione um sócio com lugar anual',
            'null_valor' => 0,
            'null_valor_legenda' => '---',
            'consulta_customizada' => 'SELECT socios.codSocio, socios.nomeSocio, lugar_anual.codSocio1 as codSocio1
                                        FROM lugar_anual 
                                        INNER JOIN socios ON lugar_anual.codSocio1 = socios.codSocio'
        )
    ),
    'codSocio2' => array(
        'legenda' => 'Sócio com Lugar Anual (Novo)',
        'tipo' => 'select',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'carrega_opcoes' => array(
            'tabela' => 'lugar_anual',
            'chave' => 'codSocio1',
            'legenda' => 'codSocio1',
            'ativo' => null,
            'null' => '1',
            'null_legenda' => 'Selecione um sócio com lugar anual',
            'null_valor' => 0,
            'null_valor_legenda' => '---',
            'consulta_customizada' => 'SELECT socios.codSocio, socios.nomeSocio, lugar_anual.codSocio1 as codSocio1
                                        FROM lugar_anual 
                                        INNER JOIN socios ON lugar_anual.codSocio1 = socios.codSocio'
        )
    ),
    'codLugar1' => array(
        'legenda' => 'Código do Lugar Anual (Inicial)',
        'tipo' => 'number',
        'chave' => 0,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 1
    ),
    'codLugar2' => array(
        'legenda' => 'Código do Lugar Anual (Novo)',
        'tipo' => 'number',
        'chave' => 0,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 1
    )
);
?>