<?php
include 'include/config.inc.php';
include $arrConfig['dir_site'] . '/include/auth.inc.php';

$resultado = '';

// Função para calcular a idade com base na data de nascimento
function calcularIdade($dataNasc)
{
  $dob = new DateTime($dataNasc);
  $now = new DateTime();
  $age = $now->diff($dob);
  return $age->y;
}

// Função para atribuir a quota com base na idade
function atribuirQuota($idade)
{
  $sql = "SELECT codQuota FROM quotas WHERE idadeMin <= $idade AND idadeMax >= $idade";
  $result = my_query($sql);
  if (count($result) > 0) {
    return $result[0]['codQuota'];
  }
  return null; // Retorna null se nenhuma quota for encontrada
}

// Obter quotas
$sql_quotas = "SELECT tipo, idadeMin, idadeMax, cartao, quota, inscricao FROM quotas";
$result_quotas = my_query($sql_quotas);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nomeSocio = isset($_POST['nomeSocio']) ? my_real_escape_string($_POST['nomeSocio']) : '';
  $CC = isset($_POST['CC']) ? my_real_escape_string($_POST['CC']) : '';
  $NIF = isset($_POST['NIF']) ? my_real_escape_string($_POST['NIF']) : '';
  $Email = isset($_POST['Email']) ? my_real_escape_string($_POST['Email']) : '';
  $N_Telemovel = isset($_POST['N_Telemovel']) ? my_real_escape_string($_POST['N_Telemovel']) : '';
  $dataNasc = isset($_POST['dataNasc']) ? my_real_escape_string($_POST['dataNasc']) : '';
  $sexo = isset($_POST['sexo']) ? my_real_escape_string($_POST['sexo']) : '';
  $nomeLocalidade = isset($_POST['nomeLocalidade']) ? my_real_escape_string($_POST['nomeLocalidade']) : '';
  $codPostal = isset($_POST['codPostal']) ? my_real_escape_string($_POST['codPostal']) : '';
  $dataInscricao = date("Y-m-d");

  // Calcular idade e atribuir quota
  $idade = calcularIdade($dataNasc);
  $codQuota = atribuirQuota($idade);

  // Upload de foto
  $fotoSocio = '';
  if (isset($_FILES['fotoSocio']) && $_FILES['fotoSocio']['error'] == UPLOAD_ERR_OK) {
    $arquivo = $_FILES['fotoSocio'];
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    $nomeFoto = md5($arquivo['name'] . time()) . '.' . $extensao;
    if (move_uploaded_file($arquivo['tmp_name'], $arrConfig['dir_site'] . '/uploads/' . $nomeFoto)) {
      $fotoSocio = $nomeFoto;
    }
  }

  if (!empty($nomeSocio) && !empty($CC) && !empty($NIF) && !empty($Email) && !empty($N_Telemovel) && !empty($dataNasc) && !empty($sexo) && !empty($nomeLocalidade) && !empty($codPostal)) {
    // Inserir dados na tabela localidades
    $sql_localidade = "INSERT INTO localidades (nomeLocalidade, codPostal) VALUES ('$nomeLocalidade', '$codPostal')";
    $codLocal = my_query($sql_localidade);

    if ($codLocal) {
      // Inserir dados na tabela socios
      $sql_socio = "INSERT INTO socios (nomeSocio, CC, NIF, Email, N_Telemovel, dataNasc, sexo, codLocal, fotoSocio, codQuota, dataInscricao) 
                          VALUES ('$nomeSocio', '$CC', '$NIF', '$Email', '$N_Telemovel', '$dataNasc', '$sexo', '$codLocal', '$fotoSocio', '$codQuota', '$dataInscricao')";

      if (my_query($sql_socio)) {
        $resultado = "Novo sócio inscrito com sucesso!";
      } else {
        $resultado = "Erro ao inscrever o sócio.";
      }
    } else {
      $resultado = "Erro ao registrar a localidade.";
    }
  } else {
    $resultado = "Por favor, preencha todos os campos.";
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
          <?php include 'include/menu.inc.php'; ?>
        </div>
      </nav>
    </header>

    <div class="site-blocks-cover overlay align-middle" style="background-image: url(img/bg-stadium.webp); height: 650px" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center">
            <p><a href="#" class="btn btn-primary btn-sm rounded-0 py-3 px-5" id="verMaisBtn">Inscrever um sócio no AGFC</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light" data-aos="fade-up" id="verificacao">
      <div class="container">
        <div class="row align-items-first">
          <div class="col-md-12">
            <h2 class="text-black mb-3 heading">Insira os seus dados</h2>
            <form action="socios.php" method="post" enctype="multipart/form-data" class="bg-white p-5">
              <div class="form-group">
                <label for="nomeSocio" class="text-black">Nome</label>
                <input type="text" class="form-control" id="nomeSocio" name="nomeSocio" required>
              </div>
              <div class="form-group">
                <label for="CC" class="text-black">Cartão de Cidadão</label>
                <input type="text" class="form-control" id="CC" name="CC" required>
              </div>
              <div class="form-group">
                <label for="NIF" class="text-black">NIF</label>
                <input type="text" class="form-control" id="NIF" name="NIF" required>
              </div>
              <div class="form-group">
                <label for="Email" class="text-black">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" required>
              </div>
              <div class="form-group">
                <label for="N_Telemovel" class="text-black">Nº Telemóvel</label>
                <input type="text" class="form-control" id="N_Telemovel" name="N_Telemovel" required>
              </div>
              <div class="form-group">
                <label for="dataNasc" class="text-black">Data de Nascimento</label>
                <input type="date" class="form-control" id="dataNasc" name="dataNasc" required>
              </div>
              <div class="form-group">
                <label for="sexo" class="text-black">Sexo</label>
                <select id="sexo" name="sexo" class="form-control" required>
                  <option value="M">Masculino</option>
                  <option value="F">Feminino</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nomeLocalidade" class="text-black">Localidade</label>
                <input type="text" class="form-control" id="nomeLocalidade" name="nomeLocalidade" required>
              </div>
              <div class="form-group">
                <label for="codPostal" class="text-black">Código Postal</label>
                <input type="text" class="form-control" id="codPostal" name="codPostal" required>
              </div>
              <div class="form-group">
                <label for="fotoSocio" class="text-black">Foto do Sócio</label>
                <input type="file" class="form-control" id="fotoSocio" name="fotoSocio" required>
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block">Inscrever</button>
            </form>
            <div class="mt-4">
              <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado) echo '<div class="alert alert-info">' . $resultado . '</div>'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4 justify-content-center">
      <div class="col-lg-8 mb-lg-0 mb-4">
        <h4 class="card-title mb-0">Tabela de Preços para Sócios</h4>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="tabela-quotas">
              <thead>
                <tr>
                  <th>Tipo</th>
                  <th>Idade</th>
                  <th>Cartão</th>
                  <th>Quota</th>
                  <th>Inscrição</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($result_quotas)) {
                  foreach ($result_quotas as $quota) {
                    $class = '';
                    if (stripos($quota['tipo'], 'Superior') !== false) {
                      $class = 'tipo-superior';
                    } elseif (stripos($quota['tipo'], 'Arquibancada') !== false) {
                      $class = 'tipo-arquibancada';
                    } elseif (stripos($quota['tipo'], 'Lateral') !== false) {
                      $class = 'tipo-lateral';
                    } elseif (stripos($quota['tipo'], 'Central') !== false) {
                      $class = 'tipo-central';
                    }
                    echo "<tr class='{$class}'>";
                    echo "<td class='align-middle text-center'><span class='text-s'>{$quota['tipo']}</span></td>";
                    echo "<td class='align-middle text-center'>";
                    if ($quota['idadeMax'] >= 100) {
                      echo "<span class='text-s'>{$quota['idadeMin']}+</span>";
                    } else {
                      echo "<span class='text-s'>{$quota['idadeMin']} - {$quota['idadeMax']}</span>";
                    }
                    echo "</td>";
                    echo "<td class='align-middle text-center'><span class='text-s'>{$quota['cartao']}€</span></td>";
                    echo "<td class='align-middle text-center'><span class='text-s'>{$quota['quota']}€</span></td>";
                    echo "<td class='align-middle text-center'><span class='text-s'>{$quota['inscricao']}€</span></td>";
                    echo "</tr>";
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
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
  </script>
</body>

</html>