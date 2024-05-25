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
  Admin
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
<body class="bg-gray-100">
  
  <div class="container">
    <div class="row">
      <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto" style="width: 100%; margin-left: 0px !important; margin-right: 0px !important;">
              <div class="card card-plain mt-8" style="margin-top: 0px !important;">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h2 style="margin-left: 6rem;" class="font-weight-bolder text-info text-gradient"><?php echo $nome_modulo; ?></h2>
                </div>
<div class="card-body"
            style="position: relative; background: #fff; border: 1px solid #dee2e6; border-radius: 1rem; padding-top: 3rem; padding-bottom: 1rem; text-align: center; display: flex; justify-content: center; align-items: center; box-shadow: 0 20px 27px 0 rgba(0, 0, 0, 0.05); width: 80%; margin: 0 auto;">
            <a href="../<?php echo $modulo; ?>" style="position: absolute; right: 20px; top: 15px; z-index: 1000;">
              <i class="fas fa-times" style="color: #000; font-size: 24px;"></i>
            </a>                  <a href="../<?php echo $modulo; ?>" style="position: absolute; right: 20px; top: 15px;">
                    <i class="fas fa-times" style="color: #000; font-size: 24px;"></i>
                  </a>
                  <form action="trata_inserir.php" method="post" enctype='multipart/form-data' style="width: 100%; display: flex; justify-content: center; align-items: center;">
                    <table width="60%">
                      <?php
                            foreach($arrCampos as $kCampos => $vCampos) {
                        if(isset($vCampos['inserir'])) {
                          if($vCampos['inserir']) {
                            mostraCamposInserir($kCampos, $vCampos);
                          }
                        }
                      }
                      ?>
                      <tr>
                        <td width="25%" class="mb-3"></td>
                        <td><div class="text-center"><input type="submit" class="btn btn-info btn-sm w-60 mt-4 mb-0"></div></td>
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
function mostraCamposInserir($campo, $arrInfo)
{
  echo '<tr>';
  echo "<td>$arrInfo[legenda]</td>";

  switch ($arrInfo['tipo']) {
    case 'text':
      echo "<td><div class='mb-3'><input class='form-control' type='text' name='$campo'></div></td>";
      break;

    case 'number':
      echo "<td><div class='mb-3'><input class='form-control' type='number' name='$campo'></div></td>";
      break;

    case 'float':
      echo "<td><div class='mb-3'><input class='form-control' type='float' name='$campo'></div></td>";
      break;
    case 'tinyint':
      echo "<td><div class='mb-3'><input class='form-control' type='tinyint' name='$campo'></div></td>";
      break;
    case 'password':
      echo "<td><input type='password' class='form-control' name='$campo'></td>";
      break;

    case 'textarea':
      echo "<td><div class='mb-3'><textarea class='form-control' name='$campo'></textarea></div></td>";
      break;

    case 'radio':
      echo "<td>";
      // carregar de OPÇÕES pré-definidas
      if (isset ($arrInfo['opcoes'])) {
        foreach ($arrInfo['opcoes'] as $k => $v) {
          $checked = '';
          if (isset ($arrInfo['default'])) {
            if ($arrInfo['default'] == $k) {
              $checked = 'checked="checked"';
            }
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
        $query = "SELECT * FROM $tabela $where";
        $arrResultados = my_query($query);
        foreach ($arrResultados as $k => $v) {
          $checked = '';
          if (isset ($arrInfo['default'])) {
            if ($arrInfo['default'] == $v[$arrInfo['carrega_opcoes']['chave']]) {
              $checked = 'checked="checked"';
            }
          }
          $id = $v[$arrInfo['carrega_opcoes']['chave']];
          $legenda = $v[$arrInfo['carrega_opcoes']['legenda']];
          echo "<input type='radio' name='$campo' value='$id' $checked>$legenda";
        }
      }
      echo "</td>";
      break;

    case 'select':
      echo "<td>";
      echo "<div class='mb-3'>";
      echo "<select class='form-select ' name='$campo'>";
      // Assumindo que este 'select' é para escolher socios e que o campo correto é 'socio_id'
      if ($campo == 'socio_id' && isset ($arrInfo['carrega_opcoes'])) {
        $where = '';
        if (isset ($arrInfo['carrega_opcoes']['ativo'])) {
          $ativo = $arrInfo['carrega_opcoes']['ativo'];
          $where = "WHERE p.$ativo = '1'";
        }
        $tabela = $arrInfo['carrega_opcoes']['tabela'];
        // Consulta para incluir um JOIN com a tabela clube
        $query = "SELECT p.id, p.nome as socio_nome, c.nome as clube_nome, p.epoca AS epoca FROM socio p
                              INNER JOIN clube c ON p.id_clube = c.id $where";
        $arrResultados = my_query($query);
        if (isset ($arrInfo['carrega_opcoes']['null'])) {
          $null_legenda = isset ($arrInfo['carrega_opcoes']['null_legenda']) ? $arrInfo['carrega_opcoes']['null_legenda'] : 'Seleccione uma opção';
          $null_valor = isset ($arrInfo['carrega_opcoes']['null_valor']) ? $arrInfo['carrega_opcoes']['null_valor'] : '';
          echo "<option value='$null_valor'>$null_legenda</option>";
        }
        foreach ($arrResultados as $linha) {
          $id = $linha['id'];
          $legenda = $linha['clube_nome'] . ' - ' . $linha['socio_nome'] . ' ' . $linha['epoca'];
          // Ajuste para verificar o valor atual do campo 'socio_id' para definir como selecionado
          $selected = (isset ($arrInfo['default']) && $arrInfo['default'] == $id) ? 'selected="selected"' : '';
          echo "<option value='$id' $selected>$legenda</option>";
        }
      }

      echo "</select>";
      echo "</td>";
      break;

    case 'checkbox':
      $ativo = '';
      if (isset ($arrInfo['default'])) {
        if ($arrInfo['default']) {
          $ativo = 'checked="checked"';
        }
      }
      echo "<td><input type='checkbox' name='$campo' $ativo></td>";
      break;
  }

  echo '</tr>';
}