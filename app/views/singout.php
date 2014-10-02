<?php

session_start();

require_once 'vendor/autoload.php';

Facebook\FacebookSession::setDefaultApplication('647197332061835', '3297885bee442af646f5729346818b2a');

$facebook = new Facebook\FacebookRedirectLoginHelper('http://localhost:8000/facebook');

unset($_SESSION['facebook']);

header('Location: views/fbteste.php');