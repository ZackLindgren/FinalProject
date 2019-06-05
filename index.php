<?php

/*
 * Zachary Lindgren
 * Chris
 * 6/5/19
 * index.php
 * This page is the controller for the Final project
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

// starting the session
session_start();

//Create an instance of the Base class
$f3 = Base::instance();

// Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3 ->route('GET /', function() {
    $view = new Template();
    echo $view ->render('views/article-demo.html');
});

// Define a route to the demo article
$f3->route('GET /article', function(){
    $view = new Template();
    echo $view->render('views/article-demo.html');
});

//Run fat free
$f3 ->run();