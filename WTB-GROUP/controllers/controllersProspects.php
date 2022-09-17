<?php

include_once('view/viewProspects.php');
include_once('models/modelsProspects.php');
include_once('controllers/controllers.php');

class ControllersProspects extends Controllers
{
    // private $getChoice;
    private $view;
    private $model;
        
    public function __construct()
    {
        $this->view = new ViewProspects();
        $this->model = new ModelProspects();
    }
    
    public function dispatchProspects($paramGet, $paramPost)
    {
        if ($paramPost) {
            $method = $paramPost['action'];
            $this->model->$method($paramPost);
        }

        // switch ($this->getChoice['action']) {
        //     case "home":
        //         $this->view->displayHome();
        //         break;
        //     case "prospects":
        //         $list=$this->model->getListProspects();
        //         $this->view->displayListProspects($list);
        //         break;
        //     case "addProspects":
        //         $this->view->displayAddProspects();
        //         break;
        //     case "updateProspects":
        //         $this->view->displayUpdateProspects($this->getChoice);
        //         break;
        //     case "deleteProspects":
        //         $this->view->displayDeleteProspects($this->getChoice);
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