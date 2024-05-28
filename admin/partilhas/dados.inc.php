<?php
$nome_modulo = "Partilha de Lugar Anual";
$modulo = "partilhas";

$arrCampos = array(
    'codPartilha' => array(
        'legenda' => 'Código da Partilha',
        'tipo' => 'int',
        'chave' => 1,
        'listagem' => 0,
        'inserir' => 0,
        'editar' => 0,
        'largura' => 50
    ),
    'codSocio1' => array(
        'legenda' => 'Sócio com Lugar Anual',
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
            'consulta_customizada' => 'SELECT socios.codSocio, socios.nomeSocio, lugar_anual.codSocio1 as codSocio1, lugar_anual.codSocio2 as codSocio2
            FROM lugar_anual 
            RIGHT JOIN socios on socios.codSocio = lugar_anual.codSocio1
            WHERE codSocio2 IS NULL AND codSocio1 IS NOT NULL'
        )
    ),
    'codSocio2' => array(
        'legenda' => 'Sócio sem Lugar Anual',
        'tipo' => 'select',
        'chave' => 0,
        'listagem' => 1,
        'inserir' => 1,
        'editar' => 1,
        'carrega_opcoes' => array(
            'tabela' => 'socios',
            'chave' => 'codSocio',
            'legenda' => 'codSocio',
            'ativo' => null,
            'null' => '1',
            'null_legenda' => 'Selecione um sócio sem lugar anual',
            'null_valor' => 0,
            'null_valor_legenda' => '---',
            'consulta_customizada' => 'SELECT socios.codSocio, socios.nomeSocio 
                                        FROM socios 
                                        LEFT JOIN lugar_anual ON socios.codSocio = lugar_anual.codSocio1 
                                        WHERE lugar_anual.codSocio1 IS NULL AND lugar_anual.codSocio2 IS NULL'
        )
    )
);
