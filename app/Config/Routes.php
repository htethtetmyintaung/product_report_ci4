<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/productList', 'Product::index');
$routes->post('/productList/getProductData', 'Product::getProductsByBranch');
