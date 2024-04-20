<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::landing');
$routes->get('/home', 'Home::landing');
$routes->get('/job','Home::findjob');
$routes->get('/job/(:any)', 'Job::findjob/$1');

$routes->get('/users','UsersController::index');
$routes->get('/login','UsersController::login');
$routes->get('/logout','UsersController::logout');
$routes->get('/register','UsersController::register');
$routes->post('/login','UsersController::signIn');
$routes->post('/register','UsersController::signUp');

$routes->post('/job','Job::postJob');

$routes->get('/pengajuan','Pengajuan::index');
$routes->post('/pengajuan','Pengajuan::getPengajuan');
$routes->get('/myapply','Pengajuan::getMyApply');
$routes->get('/mypost','Pengajuan::getMyPost');