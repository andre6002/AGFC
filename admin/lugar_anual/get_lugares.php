<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';

if (isset($_GET['codBancada'])) {
    $codBancada = $_GET['codBancada'];
    renderLugares($codBancada);
}

function getBancadaInfo($codBancada)
{
    global $arrConfig;
    $query = "SELECT maxFilas,  maxLugaresPorFila FROM bancadas WHERE codBancada = '$codBancada'";
    return my_query($query)[0];
}

function getOcupados($codBancada)
{
    global $arrConfig;
    $query = "SELECT fila, numeroDoLugar FROM lugar_anual WHERE codBancada = '$codBancada'";
    return my_query($query);
}

function renderLugares($codBancada)
{
    $bancadaInfo = getBancadaInfo($codBancada);
    $ocupados = getOcupados($codBancada);

    $maxFila = $bancadaInfo['maxFilas'];
    $maxNumLugares = $bancadaInfo['maxLugaresPorFila'];

    $ocupadosMap = [];
    foreach ($ocupados as $lugar) {
        $ocupadosMap[$lugar['fila']][$lugar['numeroDoLugar']] = true;
    }

    echo '<div class="lugares-container">';
    for ($fila = 1; $fila <= $maxFila; $fila++) {
        echo "<div class='fila'><span style='display: inline-block; width: 70px'>Fila $fila:</span>";
        for ($lugar = 1; $lugar <= $maxNumLugares; $lugar++) {
            $ocupado = isset($ocupadosMap[$fila][$lugar]);
            $classe = $ocupado ? 'ocupado' : 'livre';
            $disabled = $ocupado ? 'disabled' : '';
            echo "<label class='lugar $classe'>";
            echo "<input type='radio' name='lugar' value='$fila-$lugar' $disabled>";
            echo "<span>$lugar</span></label>";
        }
        echo "</div>";
    }
    echo '</div>';
}
