<?php
include_once 'config.inc.php';
?>
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">Sobre nós</h2>
                    <?php
                    $sobrenos = my_query("SELECT * FROM `sobrenos` WHERE `ativo` = 1");
                    foreach ($sobrenos as $key => $sobrenos) {
                        ?>
                        <p>
                            <?= $sobrenos['paragrafo1'] ?>
                        </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Páginas</h2>
                    <ul>
                        <?php
                        $pages = my_query("SELECT * FROM `menu` ORDER BY `id` ASC");
                        foreach ($pages as $page) {
                            ?>
                            <li><a href="<?= $page['url'] ?>">
                                    <?= $page['nome'] ?>
                                </a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Email</h2>
                    <p>Subscreva-se na nossa lista de e-mails para receber as atualizações mais recentes.</p>
                    <form action="index.php">
                        <input type="email" placeholder="Email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>