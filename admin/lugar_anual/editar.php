<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';
include 'dados.inc.php';
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../../img/logo.png">
<title>
  Editar socios
</title>
<!--     Fonts and icons     -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../../img/logo.png">
<title>Inserir lugares anuais</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<style>
  .lugares-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin: 20px 0;
    max-height: 400px;
    overflow-y: auto;
    width: 100%;
  }

  .fila {
    display: flex;
    margin-bottom: 10px;
  }

  .lugar {
    display: inline-block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    color: white;
    border-radius: 50%;
    margin-right: 5px;
    cursor: pointer;
  }

  .lugar.ocupado {
    background-color: red;
    cursor: not-allowed;
  }

  .lugar.livre {
    background-color: green;
  }

  .lugar.selected {
    background-color: blue;
  }

  .lugar input {
    display: none;
  }

  .lugar:has(input:checked+span) {
    background-color: blue;
  }

  .form-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
  }

  .form-section .lugares-container {
    width: 100%;
    margin-top: 20px;
  }
</style>

<?php
// -------------------------------------------
// (1) obter informações dos campos Chave
// -------------------------------------------
$arrCamposChave = array();
foreach ($arrCampos as $kCampos => $vCampos) {
  if (isset($vCampos['chave'])) {
    if ($vCampos['chave']) {
      $arrCamposChave[] = array('nome' => $kCampos, 'valor' => $_GET[$kCampos]);
    }
  }
}
$strCamposChave = '';
foreach ($arrCamposChave as $k => $v) {
  $strCamposChave .= "$v[nome] = '$v[valor]' AND ";
}
$strCamposChave = substr($strCamposChave, 0, strlen($strCamposChave) - 5);
// -------------------------------------------
// (1) fim
// -------------------------------------------


// Query
$query = "SELECT * FROM $modulo WHERE $strCamposChave";
$arrResultados = my_query($query);
?>

<body class="bg-gray-100">
  <div class="container">
    <div class="row">
      <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto" style="width: 100%; margin-left: 0px !important; margin-right: 0px !important;">
        <div class="card card-plain mt-8" style="margin-top: 0px !important;">
          <div class="card-header pb-0 text-left bg-transparent">
            <h2 style="margin-left: 6rem;" class="font-weight-bolder text-info text-gradient">
              <?php echo $nome_modulo; ?>
            </h2>
          </div>
          <div class="card-body" style="position: relative; background: #fff; border: 1px solid #dee2e6; border-radius: 1rem; padding-top: 3rem; padding-bottom: 1rem; text-align: center; display: flex; justify-content: center; align-items: center; box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05); width: 80%; margin: 0 auto;">
            <a href="../<?php echo $modulo; ?>" style="position: absolute; right: 20px; top: 15px; z-index: 1000;">
              <i class="fas fa-times" style="color: #000; font-size: 24px;"></i>
            </a>
            <form id="lugarForm" action="trata_editar.php" method="post" enctype='multipart/form-data' style="width: 100%;">
              <?php
              foreach ($arrCamposChave as $k => $v) {
                echo '<input type="hidden" name="' . $v['nome'] . '" value="' . $v['valor'] . '">';
              }
              ?>
              <table width="100%">
                <?php
                foreach ($arrCampos as $kCampos => $vCampos) {
                  if (isset($vCampos['editar'])) {
                    if ($vCampos['editar']) {
                      mostraCamposEditar($kCampos, $vCampos, $arrResultados[0][$kCampos]);
                    }
                  }
                }
                ?>
                <tr>
                  <td colspan="2">
                    <div class="text-center"><input type="submit" class="btn btn-info btn-sm w-60 mt-4 mb-0"></div>
                  </td>
                </tr>
              </table>
              </table>
              <input type="hidden" name="fila" value="">
              <input type="hidden" name="numeroDoLugar" value="">
            </form>
            <div id="lugaresContainer"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function renderLugares(codBancada) {
      fetch('get_lugares.php?codBancada=' + codBancada)
        .then(response => response.text())
        .then(data => {
          document.getElementById('lugaresContainer').innerHTML = data;
          document.querySelectorAll('.lugar input').forEach(function(input) {
            input.addEventListener('change', function() {
              var [fila, lugar] = this.value.split('-');
              document.querySelector('input[name="fila"]').value = fila;
              document.querySelector('input[name="numeroDoLugar"]').value = lugar;
            });
          });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
      document.querySelector('select[name="codBancada"]').addEventListener('change', function() {
        renderLugares(this.value);
      });
    });
  </script>
</body>

<?php

function mostraCamposEditar($campo, $arrInfo, $valor)
{
  global $arrConfig;
  echo '<tr>';
  echo "<td>$arrInfo[legenda]</td>";

  switch ($arrInfo['tipo']) {
    case 'text':
      echo "<td><div class='mb-3'><input class='form-control' type='text' name='$campo' value='$valor'></div></td>";
      break;

    case 'number':
      echo "<td><div class='mb-3'><input class='form-control' type='number' name='$campo' value='$valor'></div></td>";
      break;

    case 'file':
      echo "<td style='display: flex; align-items: center;'>";
      if ($valor) {
        echo "<img src='$arrConfig[url_site]/uploads/$valor' class='img-thumbnail mb-2 me-2' style='width: 70px;'>";
      }
      echo "<div class='mb-3'><input type='file' class='form-control' name='$campo' id='$campo'></div>";
      echo "</td>";
      break;

    case 'password':
      echo "<td><input type='password' class='form-control' name='$campo' value='$valor'></td>";
      break;

    case 'textarea':
      echo "<td><div class='mb-3'><textarea class='form-control' name='$campo' rows='2' cols='40'>$valor</textarea></div></td>";
      break;

    case 'radio':
      echo "<td>";
      if (isset($arrInfo['carrega_opcoes'])) {
        $opcoes = carregarOpcoes($arrInfo['carrega_opcoes']);
        foreach ($opcoes as $k => $v) {
          $checked = ($valor == $k) ? 'checked="checked"' : '';
          echo "<div class='form-check'>";
          echo "<input class='form-check-input' type='radio' name='$campo' value='$k' $checked>";
          echo "<label class='form-check-label'>$v</label>";
          echo "</div>";
        }
      }
      echo "</td>";
      break;

    case 'select':
      echo "<td>";
      echo "<div class='mb-3'>";
      $disabled = $campo == 'codSocio1' ? 'disabled' : '';
      echo "<select class='form-select' name='$campo' $disabled>";
      if (isset($arrInfo['opcoes'])) {
        foreach ($arrInfo['opcoes'] as $k => $v) {
          $selected = ($valor == $k) ? 'selected="selected"' : '';
          echo "<option value='$k' $selected>$v</option>";
        }
      } elseif (isset($arrInfo['carrega_opcoes'])) {
        $opcoes = carregarOpcoes($arrInfo['carrega_opcoes']);
        if (isset($arrInfo['carrega_opcoes']['null'])) {
          $null_legenda = isset($arrInfo['carrega_opcoes']['null_legenda']) ? $arrInfo['carrega_opcoes']['null_legenda'] : 'Selecione uma opção';
          $null_valor = isset($arrInfo['carrega_opcoes']['null_valor']) ? $arrInfo['carrega_opcoes']['null_valor'] : '';
          echo "<option value='$null_valor'>$null_legenda</option>";
        }
        foreach ($opcoes as $k => $v) {
          $selected = ($valor == $k) ? 'selected="selected"' : '';
          echo "<option value='$k' $selected>$v</option>";
        }
      }
      echo "</select>";
      echo "</div>";
      echo "</td>";
      break;

    case 'checkbox':
      $ativo = ($valor ? 'checked="checked"' : '');
      echo "<td><input type='checkbox' name='$campo' $ativo></td>";
      break;
  }

  echo '</tr>';
}

function carregarOpcoes($arrOpcoes)
{
  global $arrConfig;

  $tabela = $arrOpcoes['tabela'];
  $chave = $arrOpcoes['chave'];
  $legenda = $arrOpcoes['legenda'];

  $query = "
  SELECT $chave, $legenda 
  FROM $tabela";
  $result = my_query($query);
  $opcoes = [];
  if ($result) {
    foreach ($result as $linha) {
      $opcoes[$linha[$chave]] = $linha[$legenda];
    }
  }
  return $opcoes;
}
?>