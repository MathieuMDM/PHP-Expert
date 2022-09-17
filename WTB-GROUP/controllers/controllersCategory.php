<?php

include_once('view/viewCategory.php');
include_once('models/modelsCategory.php');
include_once('controllers/controllers.php');

class ControllersCategory extends Controllers
{
    private $view;
    private $model;
        
    public function __construct()
    {
        $this->view = new ViewCategory();
        $this->model = new ModelCategory();
    }
    
    public function dispatchCategory($paramGet, $paramPost)
    {
        if ($paramPost) {
            $method = $paramPost['action'];
            $this->model->$method($paramPost);
        }
        
        // switch ($paramGet['action']) {
        //     case "home":
        //         parent::displayHome();
        //         break;
        //     case "category":
        //         $list=$this->model->getListCategory();
        //         $this->view->displayListCategory($list);
        //         break;
        //     case "addCategory":
        //         $this->view->displayAddCategory();
        //         break;
        //     case "updateCategory":
        //         $this->view->displayUpdateCategory($paramGet);
        //         break;
        //     case "deleteCategory":
        //         $this->view->displayDeleteCategory($paramGet);
        //         break;
        //     default:
        //         parent::displayHome();
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
}
