<?php

// include('html/nav.html');
// include('html/header.html');

include('controllers/controllers.php');

$controller = new Controllers();
$controller->dispatch();
