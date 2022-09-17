<?php

include('view/view.php');

class Controllers
{
    private $getChoice;
    private $view;
        
    public function __construct()
    {
        $this->view = new View();
        $this->getChoice = (!empty($_GET))?$_GET:array('action'=>'home');
    }
    
    public function dispatch()
    {
        switch ($this->getChoice['action']) {
            case "home":
            $this->view->displayHome();
            break;
            case "list":
            $this->view->displayList();
            break;
            default:
            $this->view->displayHome();
            }
    }
}
