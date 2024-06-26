<?php
include_once 'config.inc.php';

$currentFileName = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$pages = [
    'dashboard' => [
        'icon' => 'fa-solid fa-store fa-2x',
        'url' => $arrConfig['url_admin'] . '',
        'name' => 'Dashboard',
        'active' => false,
    ],
    'socio' => [
        'icon' => 'fa-solid fa-users fa-2x',
        'url' => $arrConfig['url_admin'] . '/socios',
        'name' => 'Sócios',
        'active' => false,
    ],
    'localidade' => [
        'icon' => 'fa-solid fa-ruler fa-2x',
        'url' => $arrConfig['url_admin'] . '/localidades',
        'name' => 'Localidade',
        'active' => false,
    ],
    'lugar_anual' => [
        'icon' => 'fa-solid fa-calendar-days fa-2x',
        'url' => $arrConfig['url_admin'] . '/lugar_anual',
        'name' => 'Lugares Anuais',
        'active' => false,
    ],
    'quotas' => [
        'icon' => 'fa-solid fa-euro-sign fa-2x',
        'url' => $arrConfig['url_admin'] . '/quotas',
        'name' => 'Quotas',
        'active' => false,
    ],
    'bancadas' => [
        'icon' => 'fa-solid fa-futbol fa-2x',
        'url' => $arrConfig['url_admin'] . '/bancadas',
        'name' => 'Bancadas',
        'active' => false,
    ],
    'partilhas' => [
        'icon' => 'fa-solid fa-share fa-2x',
        'url' => $arrConfig['url_admin'] . '/partilhas',
        'name' => 'Partilha de Lugar Anual',
        'active' => false,
    ],
    'trocas' => [
        'icon' => 'fa-solid fa-right-left fa-2x',
        'url' => $arrConfig['url_admin'] . '/trocas',
        'name' => 'Troca de Lugar Anual',
        'active' => false,
    ],
    'noticias' => [
        'icon' => 'fa-solid fa-newspaper fa-2x',
        'url' => $arrConfig['url_admin'] . '/noticias',
        'name' => 'Notícias',
        'active' => false,
    ],
];

foreach ($pages as $key => &$page) {
    $page['active'] = $currentFileName == basename($page['url']);
}

function renderNavItem($page)
{
    $activeClass = $page['active'] ? 'active' : '';
    $iconColor = $page['active'] ? 'text-white' : 'text-dark';

    $html = "<li class='nav-item'>";
    $html .= "<a class='nav-link " . $activeClass . "' href='" . $page['url'] . "'>";
    $html .= "<div class='icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center'>";
    $html .= "<i style='height: 12px; width: 20px;' class='" . $page['icon'] . " " . $iconColor . "'></i>";
    $html .= "</div>";
    $html .= "<span class='nav-link-text ms-1'>" . $page['name'] . "</span>";
    $html .= "</a>";
    $html .= "</li>";

    echo $html;
}

echo '<ul class="navbar-nav">';
foreach ($pages as $pag => &$value) {
    renderNavItem($value);
}
echo '</ul>';
