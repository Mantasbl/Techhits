<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request = $_SERVER['REQUEST_URI'];
// Route it up!
switch ($request) {
    case '/techhits/':
        require 'views/home.php';
        break;
    case '/techhits/about':
        require 'views/about.php';
        break;
    case '/techhits/contact':
        require 'views/contact.php';
        break;
    case '/techhits/article1':
        require 'views/article1.php';
        break;
    case '/techhits/article2':
        require 'views/article2.php';
        break;

    // Everything else
    default:
        header('HTTP/1.0 404 Not Found');
        require 'views/404.php';
        break;
}
