<?php

include_once('controllers/controllersCategory.php');
include_once('controllers/controllersProspects.php');
include_once('controllers/controllersClients.php');

class Controllers
{
    public function dispatch()
    {
        $paramGet = (!empty($_GET))?$_GET:null;
        $paramPost = (!empty($_POST))?$_POST:null;
        $page = (!empty($_GET))
            ?$_GET['page']
            :((!empty($_POST))?$_POST['page']:null);
        
        $action = (!empty($_GET))
            ?$_GET['action']
            :((!empty($_POST))?$_POST['action']:null);

        if ($page==null) {
            $this->displayHome();
        } else {
            $ctrl = 'Controllers'.$page;
            $controller = new $ctrl();
            $controller->$action($paramGet, $paramPost);
        }
    }
    public function displayHome()
    {
        $view = new View();
        $view->displayHome();
    }
}