<?php

class View
{
    private $page;

    public function __construct()
    {
        $this->page = $this->searchHTML('header');
        $this->page .= $this->searchHTML('nav');
    }
        
    public function displayHome()
    {
        $this->page .= "<h1>Je suis sur la page d'accueil</h1>";
        $this->display();
    }
    public function displayList($list)
    {
        $this->page .= "<h1>Je suis sur la liste </h1>";
        
        $tableau = '<div class="container">'
        . '<table class="table table-striped table-bordered" cellspacing="0">'
        . '<thead>'
        . '<th>Prénom</th><th>Nom</th><th>Ville</th><th>Modification</th><th>Suppression</th>'
        . '</thead><tbody>';
        
        foreach ($list as $ligne) {
            $tableau .= "<tr><td>$ligne[1]</td>"
        ."<td>$ligne[2]</td>"
        ."<td>$ligne[3]</td>"
        ."<td><a href='index.php?
        action=update&parm0=$ligne[0]&parm1=$ligne[1]&parm2=$ligne[2]&parm3=$ligne[3]'><span class='glyphicon
        glyphicon-pencil'></span></a></td>"
        ."<td><a href='index.php?action=delete&parm0=$ligne[0]&parm1=$ligne[1]&parm2=$ligne[2]&parm3=$ligne[3]'><span class='glyphicon
        glyphicon-remove'></span></a></td></tr>";
        }

        $tableau .= "</tbody></table></div>";
        $this->page .= $tableau;
        $this->display();
    }

    private function displayForm($paramaters)
    {
        $this->page .= $this->searchHTML('form');
        $this->page = str_replace("{readonly}", $paramaters["readonly"], $this->page);
        $this->page = str_replace("{parm0}", $paramaters["parm0"], $this->page);
        $this->page = str_replace("{parm1}", $paramaters["parm1"], $this->page);
        $this->page = str_replace("{parm2}", $paramaters["parm2"], $this->page);
        $this->page = str_replace("{parm3}", $paramaters["parm3"], $this->page);
        $this->page = str_replace("{action}", $paramaters["action"], $this->page);
        $this->page = str_replace("{lib_action}", $paramaters["lib_action"], $this->page);
        $this->display();
    }
    public function displayAdd()
    {
        $this->page .= "<h1>Je suis sur la page d'ajout</h1>";
        $paramaters = array(
        "readonly"=>"",
        "parm0"=>"",
        "parm1"=>"",
        "parm2"=>"",
        "parm3"=>"",
        "action"=>"add",
        "lib_action"=>"Ajout");
        $this->displayForm($paramaters);
    }
        
    public function displayUpdate($paramGet)
    {
        $this->page .= "<h1>Je suis sur la page de modif</h1>";
        $paramaters = array(
        "readonly"=>"",
        "parm0"=>$paramGet['parm0'],
        "parm1"=>$paramGet['parm1'],
        "parm2"=>$paramGet['parm2'],
        "parm3"=>$paramGet['parm3'],
        "action"=>"update",
        "lib_action"=>"Modifier");
        $this->displayForm($paramaters);
    }
        
    public function displayDelete($paramGet)
    {
        $this->page .= "<h1>Je suis sur la page de suppression</h1>";
        $paramaters = array(
        "readonly"=>"readonly",
        "parm0"=>$paramGet['parm0'],
        "parm1"=>$paramGet['parm1'],
        "parm2"=>$paramGet['parm2'],
        "parm3"=>$paramGet['parm3'],
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
