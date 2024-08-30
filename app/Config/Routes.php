<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');  // Affiche la page de login
$routes->post('/login/process', 'Login::process');  // Traite le formulaire de login
$routes->get('/register', 'Register::index');  // Affiche la page d'inscription
$routes->post('/register/process', 'Register::process');  // Traite le formulaire d'inscription
$routes->get('/logout', 'Login::logout');  // Route pour la déconnexion
$routes->get('/dashboard', 'Dashboard::index'); // Assure-toi que ce contrôleur et méthode existent
$routes->get('borrow/(:num)', 'BookController::borrow/$1');
$routes->get('my_books', 'BookController::myBooks');
$routes->get('book/return/(:num)', 'BookController::returnBook/$1');
