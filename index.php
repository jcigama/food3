<?php
/** Create a food order form */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require files
require_once('vendor/autoload.php');
require_once('model/data-layer.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//default
$f3->route('GET /', function() {
    //Display a view
    $view = new Template();
    echo $view->render('views/home.html');
});

//order
$f3->route('GET /order', function($f3) {

    $f3->set('meals', getMeals());

    //Display a view
    $view = new Template();
    echo $view->render('views/form1.html');
});

//order2
$f3->route('POST /order2', function($f3) {

    $f3->set('condiments', getCondiments());

    if(isset($_POST['food'])) {
        $_SESSION['food'] = $_POST['food'];
    }

    if(isset($_POST['meal'])) {
        $_SESSION['meal'] = $_POST['meal'];
    }

    //Display a view
    $view = new Template();
    echo $view->render('views/form2.html');
});

//summary
$f3->route('POST /summary', function() {
    echo "<p>POST:</p><BR>";
    var_dump($_POST);

    echo"<p>SESSION:</p>";
    var_dump($_SESSION);

    //    var_dump($_POST);
    if(isset($_POST['conds'])) {
        $_SESSION['conds'] = implode(", ", $_POST['conds']);
    }

    //Display a view
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run fat free
$f3->run();