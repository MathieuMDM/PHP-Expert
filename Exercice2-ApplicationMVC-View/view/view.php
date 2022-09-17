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
    public function displayList()
    {
        $this->page .= "<h1>Je suis sur la liste </h1>";
        $this->display();
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