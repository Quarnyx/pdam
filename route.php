<?php

switch ($_GET['page'] ?? '') {
    case '':
    case 'dashboard':
        include 'page/home.php';
        break;
    case 'pengguna':
        include 'page/pengguna/index.php';
        break;
    case 'kas-masuk':
        include 'page/kas-masuk/index.php';
        break;
    case 'kas-keluar':
        include 'page/kas-keluar/index.php';
        break;
    case 'laporan-kas-masuk':
        include 'page/laporan/laporan-kas-masuk.php';
        break;
    case 'laporan-kas-keluar':
        include 'page/laporan/laporan-kas-keluar.php';
        break;
    default:
        include 'page/404.php';
        break;
}