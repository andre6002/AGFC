<?php
include 'include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';

$resultado = '';
$showActions = false;
$codSocio = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['verify'])) {
    $codSocio = isset($_POST['codSocio']) ? my_real_escape_string($_POST['codSocio']) : '';
    $CC = isset($_POST['CC']) ? my_real_escape_string($_POST['CC']) : '';

    if (!empty($codSocio) && !empty($CC)) {
      $sql = "SELECT * FROM socios WHERE codSocio = '$codSocio' AND CC = '$CC'";
      $result = my_query($sql);

      if (count($result) > 0) {
        // Verificar se o sócio inicial tem um registro na tabela lugar-anual
        $sql = "SELECT * FROM `lugar_anual` WHERE codSocio1 = '$codSocio'";
        $result = my_query($sql);

        if (count($result) > 0) {
          $resultado = "Verificação bem-sucedida! Você pode partilhar ou trocar o lugar.";
          $showActions = true;
        } else {
          $resultado = "O sócio não possui lugar-anual.";
        }
      } else {
        $resultado = "Verificação falhou. Por favor, verifique seus dados.";
      }
    } else {
      $resultado = "Por favor, preencha todos os campos.";
    }
  } elseif (isset($_POST['share']) || isset($_POST['swap'])) {
    $codSocioPartilha = isset($_POST['codSocioPartilha']) ? my_real_escape_string($_POST['codSocioPartilha']) : '';
    $CCPartilha = isset($_POST['CCPartilha']) ? my_real_escape_string($_POST['CCPartilha']) : '';
    $codSocio = isset($_POST['codSocio']) ? my_real_escape_string($_POST['codSocio']) : '';

    if (!empty($codSocioPartilha) && !empty($CCPartilha)) {
      // Verificar se o sócio escolhido para partilhar/trocar o lugar existe
      $sql = "SELECT * FROM socios WHERE codSocio = '$codSocioPartilha' AND CC = '$CCPartilha'";
      $result = my_query($sql);

      if (count($result) > 0) {
        if (isset($_POST['share'])) {
          // Verificação e lógica para partilhar o lugar
          // Verificar se o sócio escolhido para partilhar não possui um codSocio2 na tabela lugar-anual
          $sql = "SELECT * FROM `lugar_anual` WHERE codSocio2 = '$codSocioPartilha'";
          $result = my_query($sql);

          if (count($result) == 0) {
            // Verificar se o sócio inicial não possui um codSocio2 na tabela lugar-anual
            $sql = "SELECT * FROM `lugar_anual` WHERE codSocio1 = '$codSocio' AND codSocio2 IS NOT NULL";
            $result = my_query($sql);

            if (count($result) == 0) {
              // Adicionar ao codSocio2 da tabela lugar-anual
              $sql = "UPDATE `lugar_anual` SET codSocio2 = '$codSocioPartilha' WHERE codSocio1 = '$codSocio'";
              $updateResult = my_query($sql);

              if ($updateResult) {
                // Recuperar codLugarAnual do codSocio1
                $sql = "SELECT codLugarAnual FROM `lugar_anual` WHERE codSocio1 = '$codSocio'";
                $result = my_query($sql);
                $codLugarAnual = $result[0]['codLugarAnual'];

                // Inserir registro na tabela partilhas
                $sql = "INSERT INTO partilhas (codLugarAnual, codSocio1, codSocio2) VALUES ('$codLugarAnual', '$codSocio', '$codSocioPartilha')";
                $insertResult = my_query($sql);

                if ($insertResult) {
                  $resultado = "Lugar partilhado com sucesso!";
                } else {
                  $resultado = "Erro ao registrar a partilha.";
                }
              } else {
                $resultado = "Erro ao partilhar o lugar.";
              }
            } else {
              $resultado = "O sócio inicial já possui uma partilha.";
            }
          } else {
            $resultado = "O sócio escolhido para partilha já possui uma partilha.";
          }
        } elseif (isset($_POST['swap'])) {
          // Verificação e lógica para trocar o lugar
          // Verificar se ambos os sócios têm lugar anual
          $sql1 = "SELECT * FROM `lugar_anual` WHERE codSocio1 = '$codSocio'";
          $result1 = my_query($sql1);

          $sql2 = "SELECT * FROM `lugar_anual` WHERE codSocio1 = '$codSocioPartilha'";
          $result2 = my_query($sql2);

          if (count($result1) > 0 && count($result2) > 0) {
            $codLugarAnual1 = $result1[0]['codLugarAnual'];
            $codLugarAnual2 = $result2[0]['codLugarAnual'];

            // Trocar os codLugarAnual de cada um
            $sql = "UPDATE `lugar_anual` SET codSocio1 = '$codSocioPartilha' WHERE codLugarAnual = '$codLugarAnual1'";
            $updateResult1 = my_query($sql);

            $sql = "UPDATE `lugar_anual` SET codSocio1 = '$codSocio' WHERE codLugarAnual = '$codLugarAnual2'";
            $updateResult2 = my_query($sql);

            if ($updateResult1 && $updateResult2) {
              // Inserir registro na tabela trocas
              $sql = "INSERT INTO trocas (codSocio1, codSocio2, codLugar1, codLugar2) VALUES ('$codSocio', '$codSocioPartilha', '$codLugarAnual1', '$codLugarAnual2')";
              $insertResult = my_query($sql);

              if ($insertResult) {
                $resultado = "Troca de lugar realizada com sucesso!";
              } else {
                $resultado = "Erro ao registrar a troca.";
              }
            } else {
              $resultado = "Erro ao trocar os lugares.";
            }
          } else {
            $resultado = "Um ou ambos os sócios não possuem lugar anual.";
          }
        }
      } else {
        $resultado = "O sócio escolhido não existe.";
      }
    } else {
      $resultado = "Por favor, preencha todos os campos do sócio com quem deseja partilhar ou trocar o lugar.";
      $showActions = true;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <title>AGFC &mdash; Gestão de Sócios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="site-wrap">

    <header class="site-navbar absolute transparent" role="banner">
      <nav class="site-navigation position-relative text-right bg-black text-md-right" role="navigation">
        <div class="container position-relative">
          <div class="site-logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
          </div>
          <div class="d-inline-block d-md-none ml-md-0 mr-auto py-3">
            <a href="#" class="site-menu-toggle js-menu-toggle text-white">
              <span class="icon-menu h3"></span>
            </a>
          </div>

          <?php
          include 'include/menu.inc.php';
          ?>
        </div>
      </nav>
    </header>

    <div class="site-blocks-cover overlay" style="background-image: url(img/bg-stadium.webp); height: 650px" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-start">
          <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
            <h1 class="bg-text-line">Gerir Lugar Anual</h1>
            <p><a href="#" class="btn btn-primary btn-sm rounded-0 py-3 px-5" id="verMaisBtn">Ver Mais</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light" data-aos="fade-up" id="verificacao">
      <div class="container">
        <h2 class="text-black mb-3 heading">Insira os seus dados</h2>
        <div class="row align-items-first">

          <?php if ($showActions === true) : ?>
            <div class="col-md-5">
              <div class="p-4 border mb-3 bg-white">
                <button class="btn btn-primary btn-block mb-3" onclick="mostrarFormPartilhar()">Partilhar</button>
                <button class="btn btn-primary btn-block mb-3" onclick="mostrarFormTrocar()">Trocar</button>
              </div>
            </div>
            <div class="col-md-7" id="formPartilhar" style="display: none;">
              <form action="gerir-lugar-anual.php" method="post" class="bg-white p-5">
                <h4 class="text-black mb-3 heading">Insira os dados do sócio a partilhar</h4>
                <input type="hidden" name="codSocio" value="<?php echo htmlspecialchars($codSocio); ?>">
                <input type="hidden" name="action" value="share">
                <div class="form-group">
                  <label for="codSocioPartilha" class="text-black">Número de Sócio</label>
                  <input type="text" class="form-control" id="codSocioPartilha" name="codSocioPartilha" required>
                </div>
                <div class="form-group">
                  <label for="CCPartilha" class="text-black">Cartão de Cidadão</label>
                  <input type="text" class="form-control" id="CCPartilha" name="CCPartilha" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="share">Confirmar Partilha</button>
              </form>
            </div>
            <div class="col-md-7" id="formTrocar" style="display: none;">
              <form action="gerir-lugar-anual.php" method="post" class="bg-white p-5">
                <h4 class="text-black mb-3 heading">Insira os dados do sócio a trocar</h4>
                <input type="hidden" name="codSocio" value="<?php echo htmlspecialchars($codSocio); ?>">
                <input type="hidden" name="action" value="swap">
                <div class="form-group">
                  <label for="codSocioPartilha" class="text-black">Número de Sócio</label>
                  <input type="text" class="form-control" id="codSocioPartilha" name="codSocioPartilha" required>
                </div>
                <div class="form-group">
                  <label for="CCPartilha" class="text-black">Cartão de Cidadão</label>
                  <input type="text" class="form-control" id="CCPartilha" name="CCPartilha" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="swap">Confirmar Troca</button>
              </form>
            </div>
          <?php else : ?>
            <div class="col-md-7">
              <form action="gerir-lugar-anual.php" method="post" class="bg-white p-5">
                <div class="form-group">
                  <label for="codSocio" class="text-black">Número de Sócio</label>
                  <input type="text" class="form-control" id="codSocio" name="codSocio" required>
                </div>
                <div class="form-group">
                  <label for="CC" class="text-black">Cartão de Cidadão</label>
                  <input type="text" class="form-control" id="CC" name="CC" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="verify">Verificar</button>
              </form>
              <div class="mt-4">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado) echo '<div class="alert alert-info">' . $resultado . '</div>'; ?>
              </div>
            </div>

          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php include 'include/rodape.inc.php'; ?>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
  <script>
    $(document).ready(function() {
      $('#verMaisBtn').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: $('#verificacao').offset().top
        }, 1000);
      });
    });

    function mostrarFormPartilhar() {
      $('#formPartilhar').show();
      $('#formTrocar').hide();
    }

    function mostrarFormTrocar() {
      $('#formTrocar').show();
      $('#formPartilhar').hide();
    }
  </script>

</body>

</html>