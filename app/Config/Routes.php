<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

use App\Controllers\Pages;
use App\Controllers\News; // Tambah baris ini

$routes->get('news', [News::class, 'index']);           // Tambah baris ini

$routes->get('news/new', [News::class, 'new']); // Tambah baris ini (create News items) perhatikan penempatan baris kode karena sebelumnya diletakkan di paling akhir dan error
$routes->post('news', [News::class, 'create']); // Tambah baris ini (create News items)

$routes->get('news/(:segment)', [News::class, 'show']); // Tambah baris ini

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
