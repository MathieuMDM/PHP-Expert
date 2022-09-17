<?php

include_once('view/view.php');

class ViewCategory extends View
{
    // private $page;

    public function displayList($list)
    {
        $this->page .= "<h1>Liste des produits sur le stock de la société WTC </h1>";
        
        $tableau = '<div class="container">'
        . '<table class="table table-striped table-bordered" cellspacing="0">'
        . '<thead>'
        . '<th>Date</th><th>Marque</th><th>Modification</th><th>Suppression</th>'
        . '</thead><tbody>';
        
        foreach ($list as $ligne) {
            $tableau .= "<tr><td>$ligne[1]</td>"
        ."<td>$ligne[2]</td>"
        ."<td><a href='index.php?page=Category&action=update&parm0=$ligne[0]&parm1=$ligne[1]&parm2=$ligne[2]'><span class='glyphicon
        glyphicon-pencil'></span></a></td>"
        ."<td><a href='index.php?page=Category&action=delete&parm0=$ligne[0]&parm1=$ligne[1]&parm2=$ligne[2]'><span class='glyphicon
        glyphicon-remove'></span></a></td></tr>";
        }

        $tableau .= "</tbody></table></div>";
        $clickCategory = "<a href='index.php?page=Category&action=add'><button>Ajouter un nouveau</button></a>";
        $this->page .= $tableau . $clickCategory;
        $this->display();
    }
    
    private function displayForm($paramaters)
    {
        $this->page .= $this->searchHTML('formCategory');
        $this->page = str_replace("{readonly}", $paramaters["readonly"], $this->page);
        $this->page = str_replace("{parm0}", $paramaters["parm0"], $this->page);
        $this->page = str_replace("{parm1}", $paramaters["parm1"], $this->page);
        $this->page = str_replace("{parm2}", $paramaters["parm2"], $this->page);
        $this->page = str_replace("{action}", $paramaters["action"], $this->page);
        $this->page = str_replace("{lib_action}", $paramaters["lib_action"], $this->page);
        $this->display();
    }

    public function add()
    {
        $this->page .= "<h1>Vous êtes sur la page d'ajout d'une nouvelle catégorie</h1>";
        $paramaters = array(
            "readonly"=>"",
            "parm0"=>"",
            "parm1"=>"",
            "parm2"=>"",
            "action"=>"add",
            "lib_action"=>"Ajout");
        $this->displayForm($paramaters);
    }
    public function update($paramGet)
    {
        $this->page .= "<h1>Je suis sur la page de modif category</h1>";
        $paramaters = array(
        "readonly"=>"",
        "parm0"=>$paramGet['parm0'],
        "parm1"=>$paramGet['parm1'],
        "parm2"=>$paramGet['parm2'],
        "action"=>"update",
        "lib_action"=>"Modifier");
        $this->displayForm($paramaters);
    }
        
    public function delete($paramGet)
    {
        $this->page .= "<h1>Je suis sur la page de suppression category</h1>";
        $paramaters = array(
        "readonly"=>"readonly",
        "parm0"=>$paramGet['parm0'],
        "parm1"=>$paramGet['parm1'],
        "parm2"=>$paramGet['parm2'],
        "action"=>"delete",
        "lib_action"=>"Supprimer");
        $this->displayForm($paramaters);
    }
        
    public function display()
    {
        $this->page .= $this->searchHTML('footer');
        echo $this->page;
    }
        
    private function searchHTML($filename)
    {
        $content = file_get_contents('html/'.$filename.'.html');
        return $content;
    }
}