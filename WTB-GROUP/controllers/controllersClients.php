<?php

include_once('view/viewClients.php');
include_once('models/modelsClients.php');
include_once('controllers/controllers.php');

class ControllersClients extends Controllers
{
    // private $getChoice;
    private $view;
    private $model;
        
    public function __construct()
    {
        $this->view = new ViewClients();
        $this->model = new ModelClients();
    }
    
    public function dispatchClients($paramGet, $paramPost)
    {
        if ($paramPost) {
            $method = $paramPost['action'];
            $this->model->$method($paramPost);
        }

        // switch ($this->getChoice['action']) {
        //     case "home":
        //         $this->view->displayHome();
        //         break;
        //     case "clients":
        //         $list=$this->model->getListClients();
        //         $this->view->displayListClients($list);
        //         break;
        //     case "addClients":
        //         $this->view->displayAddClients();
        //         break;
        //     case "updateClients":
        //         $this->view->displayUpdateClients($this->getChoice);
        //         break;
        //     case "deleteClients":
        //         $this->view->displayDeleteClients($this->getChoice);
        //         break;
        //     default:
        //         $this->view->displayHome();
        //     }
    }
    public function list($paramGet, $paramPost)
    {
        $list=$this->model->getList();
        $this->view->displayList($list);
    }

    public function add($paramGet, $paramPost)
    {
        if ($paramPost) {
            $this->model->add($paramPost);
            $this->list($paramGet, $paramPost);
        } else {
            $this->view->add();
        }
    }

    public function update($paramGet, $paramPost)
    {
        if ($paramPost) {
            $this->model->update($paramPost);
            $this->list($paramGet, $paramPost);
        } else {
            $this->view->update($paramGet);
        }
    }
    public function delete($paramGet, $paramPost)
    {
        if ($paramPost) {
            $this->model->delete($paramPost);
            $this->list($paramGet, $paramPost);
        } else {
            $this->view->delete($paramGet);
        }
    }
    public function transfer($paramGet, $paramPost)
    {
        if ($paramPost) {
            $this->model->delete($paramPost);
            $this->model->transfer($paramPost);
            $this->list($paramGet, $paramPost);
        } else {
            $this->view->transfer($paramGet);
        }
    }
}