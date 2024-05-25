<?php
include_once 'config.inc.php';
?>
<div class="main-menu-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <!-- menu start -->
                <nav class="main-menu">
                    <ul>
                        <?php
                        $currentPage = $_SERVER['REQUEST_URI']; 
                        $pages = my_query("SELECT * FROM `menu` ORDER BY `id` ASC");
                        foreach ($pages as $key => $page) {
                            $isActive = strpos($currentPage, basename($page['url'])) !== false ? 'class="current-list-item"' : ''; ?>
                            <li <?= $isActive ?>><a href="<?= $page['url'] ?>">
                                    <?= $page['nome'] ?>
                                </a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>

                <div class="mobile-menu"></div>
                <!-- menu end -->
            </div>
        </div>
    </div>
</div>