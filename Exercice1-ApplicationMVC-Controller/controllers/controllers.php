<?php

class Controllers
{
    private $getChoice;
        
    public function __construct()
    {
        $this->getChoice = (!empty($_GET))?$_GET:array('action'=>'?choice?');
    }
    
    public function dispatch()
    {
        echo "affichage de la page d'accueil " .$this->getChoice['action'] ."<br>"." affichage de la liste des utilisateurs ". $this->getChoice['action'] ."<br>"." affichage d'un formulaire d'ajout pour un nouvel utilisateur ". $this->getChoice['action'] ."<br>"." modification d'une fiche utilisateur ". $this->getChoice['action'] ."<br>"." suppression d'une  fiche utilisateur ". $this->getChoice['action'];
    }
}