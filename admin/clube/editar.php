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
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>
<?php

// -------------------------------------------
// (1) obter informações dos campos Chave
// -------------------------------------------
$arrCamposChave = array();
foreach ($arrCampos as $kCampos => $vCampos) {
  if (isset ($vCampos['chave'])) {
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
            <form action="trata_editar.php" method="post" enctype='multipart/form-data' style="width: 100%; display: flex; justify-content: center !important; align-items: center !important;">
              <a href="../<?php echo $modulo; ?>" style="position: absolute; right: 20px; top: 15px;">
                <i class="fas fa-times" style="color: #000; font-size: 24px;"></i>
              </a>
              <?php
              // construir os hidden fields, que são os campos chave
              foreach ($arrCamposChave as $k => $v) {
                echo '<input type="hidden" name="' . $v['nome'] . '" value="' . $v['valor'] . '">';
              }
              ?>
              <table width="70%">
                <?php
                foreach ($arrCampos as $kCampos => $vCampos) {
                  if (isset ($vCampos['editar'])) {
                    if ($vCampos['editar']) {
                      if ($kCampos != 'badges_permitidos') {
                        mostraCamposEditar($kCampos, $vCampos, $arrResultados[0][$kCampos]);
                      } else {
                        mostraCamposEditar($kCampos, $vCampos, null);
                      }
                    }
                  }
                }
                ?>
                </tr>
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

<?php


// funções para tratar os campos
function mostraCamposEditar($campo, $arrInfo, $valor)
{
  global $arrConfig, $arrCamposChave;
  echo '<tr>';
  echo "<td>$arrInfo[legenda]</td>";

  /*
  <label for="">

  <textarea name="" rows="" cols="">

  <select name=""> <option value="">

  <input type="button">
  <input type="checkbox">
  <input type="color">
  <input type="date">
  <input type="datetime-local">
  <input type="email">
  <input type="file">
  <input type="hidden">
  <input type="image">
  <input type="month">
  <input type="number">
  <input type="password">
  <input type="radio">
  <input type="range">
  <input type="reset">
  <input type="search">
  <input type="submit">
  <input type="tel">
  <input type="text">
  <input type="time">
  <input type="url">
  <input type="week">
  */

  switch ($arrInfo['tipo']) {
    case 'text':
      echo "<td><div class='mb-3'><input class='form-control' type='text' name='$campo' value='$valor'></div></td>";
      break;

    case 'number':
      echo "<td><div class='mb-3'><input class='form-control' type='number' name='$campo' value='$valor'></div></td>";
      break;

    case 'float':
      echo "<td><div class='mb-3'><input class='form-control' type='float' name='$campo' value='$valor'></div></td>";
      break;

    case 'tinyint':
      echo "<td><div class='mb-3'><input class='form-control' type='tinyint' name='$campo' value='$valor'></div></td>";
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
      // carregar de OPÇÕES pré-definidas
      if (isset ($arrInfo['opcoes'])) {
        foreach ($arrInfo['opcoes'] as $k => $v) {
          $checked = '';
          if ($valor == $k) {
            $checked = 'checked="checked"';
          }
          echo "<input type='radio' name='$campo' value='$k' $checked>$v";
        }
        // carregar de uma tabela da BD  
      } elseif (isset ($arrInfo['carrega_opcoes'])) {
        $where = '';
        if (isset ($arrInfo['carrega_opcoes']['ativo'])) {
          $ativo = $arrInfo['carrega_opcoes']['ativo'];
          $where = "WHERE $ativo = '1'";
        }
        $tabela = $arrInfo['carrega_opcoes']['tabela'];
        $query = "SELECT * FROM $tabela AND $where";
        $arrResultados = my_query($query);
        foreach ($arrResultados as $k => $v) {
          $checked = '';
          if ($valor == $v[$arrInfo['carrega_opcoes']['chave']]) {
            $checked = 'checked="checked"';
          }
          $id = $v[$arrInfo['carrega_opcoes']['chave']];
          $legenda = $v[$arrInfo['carrega_opcoes']['legenda']];
          echo "<input type='radio' name='$campo' value='$id' $checked>$legenda";
        }
      }
      echo "</td>";
      break;

    case 'select_multiple':
      echo "<td>";
      echo "<div class='mb-3'>";
      echo "<select class='form-select' name='{$campo}[]' multiple='multiple' style='height: 180px;'>";

      $query = "SELECT id, nome, logo FROM badge";
      $arrResultados = my_query($query);

      $meusItens = my_query("SELECT * FROM clube_badge WHERE clube_id = " . $arrCamposChave[0]['valor']);

      foreach ($arrResultados as $linha) {
        $existe = '0';

        foreach ($meusItens as $meuItem) {
          if ($meuItem['badge_id'] == $linha['id']) {
            $existe = '1';
          }
        }

        if ($existe == '1') {
          echo "<option selected='selected' value='{$linha['id']}'>
                      <strong>
                      {$linha['nome']}
                      </strong>
                      </option>";
        } else {
          echo "<option value='{$linha['id']}'>{$linha['nome']}</option>";
        }
      }

      echo "</select>";
      echo "</td>";
      break;

    case 'select':
      echo "<td>";
      echo "<div class='mb-3'>";
      echo "<select class='form-select ' name='$campo'>";
      // carregar de OPÇÕES pré-definidas
      if (isset ($arrInfo['opcoes'])) {
        foreach ($arrInfo['opcoes'] as $k => $v) {
          $selected = '';
          if ($valor == $k) {
            $selected = 'selected="selected"';
          }
          echo "<option value='$k' $selected>$v</option>";
        }
      }
      // carregar de uma tabela da BD 
      elseif (isset ($arrInfo['carrega_opcoes'])) {
        $where = '';
        if (isset ($arrInfo['carrega_opcoes']['ativo'])) {
          $ativo = $arrInfo['carrega_opcoes']['ativo'];
          $where = "WHERE $ativo = '1'";
        }
        $tabela = $arrInfo['carrega_opcoes']['tabela'];
        $query = "SELECT * FROM $tabela $where";
        $arrResultados = my_query($query);
        if (isset ($arrInfo['carrega_opcoes']['null'])) {
          $null_legenda = isset ($arrInfo['carrega_opcoes']['null_legenda']) ? $arrInfo['carrega_opcoes']['null_legenda'] : 'Seleccione uma opção';
          $null_valor = isset ($arrInfo['carrega_opcoes']['null_valor']) ? $arrInfo['carrega_opcoes']['null_valor'] : '';
          echo "<option value='$null_valor'>$null_legenda</option>";
        }
        foreach ($arrResultados as $k => $v) {
          $selected = '';
          if ($valor == $v[$arrInfo['carrega_opcoes']['chave']]) {
            $selected = 'selected="selected"';
          }
          $id = $v[$arrInfo['carrega_opcoes']['chave']];
          $legenda = $v[$arrInfo['carrega_opcoes']['legenda']];
          echo "<option value='$id' $selected>$legenda</option>";
        }
      }
      echo "</select>";
      echo "</td>";
      break;

    case 'checkbox':
      $ativo = ($valor ? 'checked="checked"' : '');
      echo "<td><input type='checkbox' name='$campo' $ativo></td>";
      break;
  }

  echo '</tr>';
}
?>