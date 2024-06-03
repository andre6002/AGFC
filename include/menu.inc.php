<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<ul class="site-menu js-clone-nav d-none d-md-block">
    <li class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
        <a href="index.php">Home</a>
    </li>
    <li class="<?php echo ($current_page == 'socios.php') ? 'active' : ''; ?>">
        <a href="socios.php">Sócios</a>
    </li>
    <li class="has-children <?php echo ($current_page == 'lugar-anual.php' || $current_page == 'gerir-lugar-anual.php') ? 'active' : ''; ?>">
        <a href="lugar-anual.php">Lugar Anual</a>
        <ul class="dropdown arrow-top">
            <li class="<?php echo ($current_page == 'lugar-anual.php') ? 'active' : ''; ?>"><a href="lugar-anual.php">Adquirir</a></li>
            <li class="<?php echo ($current_page == 'gerir-lugar-anual.php') ? 'active' : ''; ?>"><a href="gerir-lugar-anual.php">Gerir</a></li>
        </ul>
    </li>
    <li class="<?php echo ($current_page == 'vantagens.php') ? 'active' : ''; ?>"><a href="vantagens.php">Vantagens</a></li>
    <li class="<?php echo ($current_page == 'noticias.php' || $current_page == 'noticia-unica.php') ? 'active' : ''; ?>"><a href="noticias.php">Notícias</a></li>
    <li class="<?php echo ($current_page == 'sobre.php') ? 'active' : ''; ?>">
        <a href="sobre.php">Sobre</a>
    </li>
</ul>