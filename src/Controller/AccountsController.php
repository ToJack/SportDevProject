<?php
namespace App\Controller;

use App\Controller\AppController;

class AccountsController  extends AppController
{

    public function accueil()
    {

    }
    public function classements()
    {
      $this->loadModel("Members");
      $m=$this->Members->find();

      $this->loadModel("Logs");
      $l=$this->Logs->find();

      $this->loadModel("Workouts");
      $w=$this->Workouts->find();

      $this->set("m",$m->toArray());
      $this->set("l",$l->toArray());
      $this->set("w",$w->toArray());
    }
    public function connexion()
    {

    }
    public function monCompte()
    {

    }
    public function objetsConnectes()
    {

    }
    public function sceances()
    {

    }
}
