<?php

include_once('view/view.php');

class ViewClients extends View
{
    // private $page;

    public function displayList($list)
    {
        $this->page .= "<h1>Liste des produits sur le stock de la société SDP </h1>";
        
        $tableau = '<div class="container">'
        . '<table class="table table-striped table-bordered" cellspacing="0">'
        . '<thead>'
        . '<th>Date</th><th>Marque</th><th>Modele</th><th>Taille</th><th>Quantité</th><th>Commentaire</th><th>Modification</th><th>Suppression</th><th>Transfert vers WTB</th>'
        . '</thead><tbody>';
        
        foreach ($list as $ligne) {
            $tableau .= "<tr><td>$ligne[1]</td>"
        ."<td>$ligne[2]</td>"
        ."<td>$ligne[3]</td>"
        ."<td>$ligne[4]</td>"
        ."<td>$ligne[5]</td>"
        ."<td>$ligne[6]</td>"
        ."<td><a href='index.php?page=Clients&action=update&parm0=$ligne[0]&parm1=$ligne[1]&parm2=$ligne[2]&parm3=$ligne[3]&parm4=$ligne[4]&parm5=$ligne[5]&parm6=$ligne[6]'><span class='glyphicon
        glyphicon-pencil'></span></a></td>"
        ."<td><a href='index.php?page=Clients&action=delete&parm0=$ligne[0]&parm1=$ligne[1]&parm2=$ligne[2]&parm3=$ligne[3]&parm4=$ligne[4]&parm5=$ligne[5]&parm6=$ligne[6]'><span class='glyphicon
        glyphicon-remove'></span></a></td>"
        ."<td><a href='index.php?page=Clients&action=transfer&parm0=$ligne[0]&parm1=$ligne[1]&parm2=$ligne[2]&parm3=$ligne[3]&parm4=$ligne[4]&parm5=$ligne[5]&parm6=$ligne[6]'><span class='glyphicon
        glyphicon-transfer'></span></a></td></tr>";
        }

        $tableau .= "</tbody></table></div>";
        $clickClients = "<a href='index.php?page=Clients&action=add'><button>Ajouter un nouveau</button></a>";
        $this->page .= $tableau . $clickClients;
        $this->display();
    }


    private function displayForm($paramaters)
    {
        $this->page .= $this->searchHTML('formClients');
        $this->page = str_replace("{readonly}", $paramaters["readonly"], $this->page);
        $this->page = str_replace("{parm0}", $paramaters["parm0"], $this->page);
        $this->page = str_replace("{parm1}", $paramaters["parm1"], $this->page);
        $this->page = str_replace("{parm2}", $paramaters["parm2"], $this->page);
        $this->page = str_replace("{parm3}", $paramaters["parm3"], $this->page);
        $this->page = str_replace("{parm4}", $paramaters["parm4"], $this->page);
        $this->page = str_replace("{parm5}", $paramaters["parm5"], $this->page);
        $this->page = str_replace("{parm6}", $paramaters["parm6"], $this->page);
        $this->page = str_replace("{action}", $paramaters["action"], $this->page);
        $this->page = str_replace("{lib_action}", $paramaters["lib_action"], $this->page);
        $this->display();
    }

    public function add()
    {
        $this->page .= "<h1>Ajouter un nouveau produit pour la société SDP</h1>";
        $paramaters = array(
            "readonly"=>"",
            "parm0"=>"",
            "parm1"=>"",
            "parm2"=>"",
            "parm3"=>"",
            "parm4"=>"",
            "parm5"=>"",
            "parm6"=>"",
            "action"=>"add",
            "lib_action"=>"Ajout");
        $this->displayForm($paramaters);
    }


    public function update($paramGet)
    {
        $this->page .= "<h1>Modifier ce produit SDP</h1>";
        $paramaters = array(
        "readonly"=>"",
        "parm0"=>$paramGet['parm0'],
        "parm1"=>$paramGet['parm1'],
        "parm2"=>$paramGet['parm2'],
        "parm3"=>$paramGet['parm3'],
        "parm4"=>$paramGet['parm4'],
        "parm5"=>$paramGet['parm5'],
        "parm6"=>$paramGet['parm6'],
        "action"=>"update",
        "lib_action"=>"Modifier");
        $this->displayForm($paramaters);
    }
        
    public function delete($paramGet)
    {
        $this->page .= "<h1>Vous êtes sûr de supprimer ce produit SDP</h1>";
        $paramaters = array(
        "readonly"=>"readonly",
        "parm0"=>$paramGet['parm0'],
        "parm1"=>$paramGet['parm1'],
        "parm2"=>$paramGet['parm2'],
        "parm3"=>$paramGet['parm3'],
        "parm4"=>$paramGet['parm4'],
        "parm5"=>$paramGet['parm5'],
        "parm6"=>$paramGet['parm6'],
        "action"=>"delete",
        "lib_action"=>"Supprimer");
        $this->displayForm($paramaters);
    }
    public function transfer($paramGet)
    {
        $this->page .= "<h1>Êtes-vous sûr de transférer ce produit SDP vers WTB?</h1>";
        $paramaters = array(
        "readonly"=>"",
        "parm0"=>$paramGet['parm0'],
        "parm1"=>$paramGet['parm1'],
        "parm2"=>$paramGet['parm2'],
        "parm3"=>$paramGet['parm3'],
        "parm4"=>$paramGet['parm4'],
        "parm5"=>$paramGet['parm5'],
        "parm6"=>$paramGet['parm6'],
        "action"=>"transfer",
        "lib_action"=>"Transfer");
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