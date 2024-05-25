<?php
include_once 'config.inc.php';

$currentFileName = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$pages = [
    'admins' => [
        'icon' => 'fa-solid fa-user-tie fa-2x',
        'url' => $arrConfig['url_admin']. '/admins',
        'name' => 'Administradores',
        'active' => false,
    ],
];

foreach ($pages as $key => &$page) {
    $page['active'] = $currentFileName == basename($page['url']);
}

function renderNavItem2($page) {
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
    renderNavItem2($value);
}
echo '</ul>';
