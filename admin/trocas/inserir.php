<?php
include '../../include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';
include 'dados.inc.php';

?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../img/logo.png">
  <title>
    Inserir Partilha de Lugar Anual
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="bg-gray-100">
  <div class="container">
    <div class="row">
      <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto"
        style="width: 100%; margin-left: 0px !important; margin-right: 0px !important;">
        <div class="card card-plain mt-8" style="margin-top: 0px !important;">
          <div class="card-header pb-0 text-left bg-transparent">
            <h2 style="margin-left: 6rem;" class="font-weight-bolder text-info text-gradient">
              <?php echo $nome_modulo; ?>
            </h2>
          </div>
          <div class="card-body"
            style="position: relative; background: #fff; border: 1px solid #dee2e6; border-radius: 1rem; padding-top: 3rem; padding-bottom: 1rem; text-align: center; display: flex; justify-content: center; align-items: center; box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05); width: 80%; margin: 0 auto;">
            <a href="../<?php echo $modulo; ?>" style="position: absolute; right: 20px; top: 15px; z-index: 1000;">
              <i class="fas fa-times" style="color: #000; font-size: 24px;"></i>
            </a>
            <form action="trata_inserir.php" method="post" enctype='multipart/form-data'
              style="width: 100%; display: flex; justify-content: center; align-items: center;">
              <table width="70%">
                <?php
                foreach ($arrCampos as $kCampos => $vCampos) {
                  if (isset($vCampos['inserir']) && $vCampos['inserir']) {
                    mostraCamposInserir($kCampos, $vCampos);
                  }
                }
                ?>
                <tr>
                  <td width="100"></td>
                  <td>
                    <div class="text-center"><input type="submit" class="btn btn-info btn-sm w-60 mt-4 mb-0"></div>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php

// funções para tratar os campos
function mostraCamposInserir($campo, $arrInfo)
{
  echo '<tr>';
  echo "<td>$arrInfo[legenda]</td>";

  switch ($arrInfo['tipo']) {
    case 'text':
      echo "<td><div class='py-2'><input class='form-control' type='text' name='$campo'></div></td>";
      break;

    case 'number':
      echo "<td><div class='py-2'><input class='form-control' type='number' name='$campo'></div></td>";
      break;

    case 'file':
      echo "<td style='display: flex; align-items: center;'><div class='py-2'><input type='file' class='form-control' name='$campo'></div></td>";
      break;

    case 'float':
      echo "<td><div class='py-2'><input class='form-control' type='float' name='$campo'></div></td>";
      break;

    case 'date':
      echo "<td><div class='py-2'><input class='form-control' type='date' name='$campo'></div></td>";
      break;

    case 'tinyint':
      echo "<td><div class='py-2'><input class='form-control' type='tinyint' name='$campo'></div></td>";
      break;

    case 'password':
      echo "<td><input type='password' class='form-control' name='$campo'></td>";
      break;

    case 'textarea':
      echo "<td><div class='py-2'><textarea class='form-control' name='$campo'></textarea></div></td>";
      break;

    case 'radio':
      echo "<td>";
      if (isset($arrInfo['opcoes'])) {
        foreach ($arrInfo['opcoes'] as $k => $v) {
          $checked = '';
          if (isset($arrInfo['default']) && $arrInfo['default'] == $k) {
            $checked = 'checked="checked"';
          }
          echo "<input type='radio' name='$campo' value='$k' $checked>$v";
        }
      } elseif (isset($arrInfo['carrega_opcoes'])) {
        $opcoes = carregarOpcoes($arrInfo['carrega_opcoes']);
        foreach ($opcoes as $k => $v) {
          $checked = '';
          if (isset($arrInfo['default']) && $arrInfo['default'] == $k) {
            $checked = 'checked="checked"';
          }
          echo "<input type='radio' name='$campo' value='$k' $checked>$v";
        }
      }
      echo "</td>";
      break;

    case 'select':
      echo "<td>";
      echo "<div class='py-2'>";
      echo "<select class='form-select' name='$campo'>";
      if (isset($arrInfo['carrega_opcoes'])) {
        $opcoes = carregarOpcoes($arrInfo['carrega_opcoes']);
        foreach ($opcoes as $k => $v) {
          $selected = '';
          if (isset($arrInfo['default']) && $arrInfo['default'] == $k) {
            $selected = 'selected="selected"';
          }
          echo "<option value='$k' $selected>$v</option>";
        }
      }
      echo "</select>";
      echo "</div>";
      echo "</td>";
      break;

    case 'checkbox':
      $ativo = '';
      if (isset($arrInfo['default']) && $arrInfo['default']) {
        $ativo = 'checked="checked"';
      }
      echo "<td><div class='form-check form-check-info text-left'><input class='form-check-input' type='checkbox' name='$campo' $ativo></div></td>";
      break;
  }

  echo '</tr>';
}

function carregarOpcoes($arrOpcoes)
{
  global $arrConfig;

  if (isset($arrOpcoes['consulta_customizada'])) {
    $query = $arrOpcoes['consulta_customizada'];
  } else {
    $tabela = $arrOpcoes['tabela'];
    $chave = $arrOpcoes['chave'];
    $legenda = $arrOpcoes['legenda'];
    $where = '';
    if (isset($arrOpcoes['ativo']) && $arrOpcoes['ativo'] !== null) {
      $ativo = $arrOpcoes['ativo'];
    }
    $query = "SELECT $chave, $legenda FROM $tabela";
  }

  $result = my_query($query);
  $opcoes = array();
  if ($result) {
    foreach ($result as $linha) {
      $opcoes[$linha[$arrOpcoes['chave']]] = $linha[$arrOpcoes['legenda']];
    }
  }
  return $opcoes;
}
?>