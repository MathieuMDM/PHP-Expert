<?php

// include('html/nav.html');
// include('html/header.html');

// include('controllers/controllersCategory.php');
// include('controllers/controllersProspects.php');
// include('controllers/controllersClients.php');


// $controllerC = new ControllersCategory();
// $controllerC->dispatchCategory();
// $controllerP = new ControllersProspects();
// $controllerP->dispatchProspects();
// $controllerL = new ControllersClients();
// $controllerL->dispatchClients();


include_once('controllers/controllers.php');


$controller = new Controllers();
$controller->dispatch();
