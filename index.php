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
    echo $view ->render('views/article.html');
});

// Define a route to the demo article
$f3->route('GET /article/@id', function($f3, $params){
    $database = new Database();

    $id = $params['id'];
    $articleFields = $database->getArticle($id);

    $f3->set('title', $articleFields['title']);
    $f3->set('author', $articleFields['username']);
    $f3->set('text', $articleFields['text']);
    $f3->set('picture', $articleFields['picture']);
    $f3->set('date', $articleFields['article_date']);

    $view = new Template();
    echo $view->render('views/article.html');
});

// Define a route to the demo form
$f3->route('GET|POST /form', function(){
    $view = new Template();
    echo $view->render('views/form-demo.html');
});

//Run fat free
$f3 ->run();