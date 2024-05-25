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
    'clube' => [
        'icon' => 'fa-solid fa-users fa-2x',
        'url' => $arrConfig['url_admin'] . '/clube',
        'name' => 'Clubes',
        'active' => false,
    ],
    'liga' => [
        'icon' => 'fa-solid fa-trophy fa-2x',
        'url' => $arrConfig['url_admin'] . '/liga',
        'name' => 'Ligas',
        'active' => false,
    ],
    'personalizacaopredefinida' => [
        'icon' => 'fa-solid fa-tshirt fa-2x',
        'url' => $arrConfig['url_admin'] . '/personalizacaopredefinida',
        'name' => 'Equipamentos Predef.',
        'active' => false,
    ],  
    'badge' => [
        'icon' => 'fa-solid fa-futbol',
        'url' => $arrConfig['url_admin'] . '/badge',
        'name' => 'Badges',
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
?>