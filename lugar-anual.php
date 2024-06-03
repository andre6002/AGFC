<?php
include_once 'include/config.inc.php';
include 'admin/lugar_anual/dados.inc.php';

$resultado = '';
$showSelection = false;
$codSocio = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['verify'])) {
    $codSocio = isset($_POST['codSocio']) ? my_real_escape_string($_POST['codSocio']) : '';
    $CC = isset($_POST['CC']) ? my_real_escape_string($_POST['CC']) : '';

    if (!empty($codSocio) && !empty($CC)) {
      $sql = "SELECT * FROM socios WHERE codSocio = '$codSocio' AND CC = '$CC'";
      $result = my_query($sql);

      if (count($result) > 0) {
        // Verificar se o sócio já possui um lugar anual
        $sql = "SELECT * FROM lugar_anual WHERE codSocio1 = '$codSocio'";
        $result = my_query($sql);

        if (count($result) > 0) {
          $resultado = "O sócio já possui um lugar anual.";
        } else {
          $resultado = "Verificação bem-sucedida! Você pode adquirir um lugar anual.";
          $showSelection = true;
        }
      } else {
        $resultado = "Verificação falhou. Por favor, verifique seus dados.";
      }
    } else {
      $resultado = "Por favor, preencha todos os campos.";
    }
  } elseif (isset($_POST['adquirir'])) {
    $codSocio = isset($_POST['codSocio']) ? my_real_escape_string($_POST['codSocio']) : '';
    $codBancada = isset($_POST['codBancada']) ? my_real_escape_string($_POST['codBancada']) : '';
    $fila = isset($_POST['fila']) ? my_real_escape_string($_POST['fila']) : '';
    $numeroDoLugar = isset($_POST['numeroDoLugar']) ? my_real_escape_string($_POST['numeroDoLugar']) : '';

    if (!empty($codSocio) && !empty($codBancada) && !empty($fila) && !empty($numeroDoLugar)) {
      $sql = "SELECT * FROM lugar_anual WHERE codSocio1 = '$codSocio'";
      $result = my_query($sql);

      if (count($result) > 0) {
        $resultado = "O sócio já possui um lugar anual.";
      } else {
        $sql = "INSERT INTO lugar_anual (codSocio1, codBancada, fila, numeroDoLugar) VALUES ('$codSocio', '$codBancada', '$fila', '$numeroDoLugar')";
        $result = my_query($sql);

        if ($result) {
          $resultado = "Lugar anual adquirido com sucesso!";
        } else {
          $resultado = "Erro ao adquirir o lugar anual.";
        }
      }
    } else {
      $resultado = "Por favor, preencha todos os campos.";
      $showSelection = true;
    }
  }
}
?>


<!DOCTYPE html>
<html lang="pt">

<head>
  <title>AGFC &mdash; Aquisição de Lugar Anual</title>
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

          <?php include 'include/menu.inc.php'; ?>
        </div>
      </nav>
    </header>

    <div class="site-blocks-cover overlay" style="background-image: url(img/bg-stadium.webp); height: 600px" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-start">
          <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
            <h1 class="bg-text-line">Adquirir Lugar Anual</h1>
            <p><a href="#" class="btn btn-primary btn-sm rounded-0 py-3 px-5" id="verMaisBtn">Ver Mais</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light" data-aos="fade-up" id="verificacao">
      <div class="container">
        <div class="row align-items-first">

          <?php if ($showSelection) : ?>
            <div class="col-md-12">
              <form action="lugar-anual.php" method="post" class="bg-white p-5">
                <input type="hidden" name="codSocio" value="<?php echo htmlspecialchars($codSocio); ?>">
                <div class="form-group">
                  <label for="codBancada" class="text-black">Selecione a Bancada</label>
                  <select name="codBancada" id="codBancada" class="form-control">
                    <option value="" selected disabled hidden>Selecione</option>
                    <?php
                    $sqlBancadas = "SELECT * FROM bancadas";
                    $bancadas = my_query($sqlBancadas);
                    foreach ($bancadas as $bancada) {
                      echo "<option value='{$bancada['codBancada']}'>{$bancada['nomeBancada']}</option>";
                    }
                    ?>
                  </select>
                </div>
                <div id="lugaresContainer"></div>
                <input type="hidden" name="fila" value="">
                <input type="hidden" name="numeroDoLugar" value="">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="adquirir">Adquirir Lugar</button>
              </form>
            </div>
          <?php elseif ($showSelection === false) :  ?>
            <div class="col-md-7">
              <h2 class="text-black mb-3 heading">Insira os seus dados</h2>
              <form action="lugar-anual.php" method="post" class="bg-white p-5">
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

      $('#codBancada').change(function() {
        var codBancada = $(this).val();
        $.ajax({
          url: 'include/get_lugares.php',
          method: 'GET',
          data: {
            codBancada: codBancada
          },
          success: function(data) {
            $('#lugaresContainer').html(data);
            $('.lugar input').change(function() {
              var [fila, lugar] = $(this).val().split('-');
              $('input[name="fila"]').val(fila);
              $('input[name="numeroDoLugar"]').val(lugar);
            });
          }
        });
      });
    });
  </script>

</body>

</html>