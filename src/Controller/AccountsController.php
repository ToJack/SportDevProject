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
      if($this->request->is('POST')){
        $this->Flash->success($this->request->data("email"));
      }

    }
    public function monCompte()
    {
      $this->loadModel("Members");

      $membres = $this->Members->find()
      ->where(['id'=> "56eb38b4-04b0-4667-ba54-0796b38f37ff"]);
      $this->set("membres",$membres->toArray());
      foreach ($membres as $membres)
    {
        //debug($membres->id);
      }
    }
    public function objetsConnectes()
    {

    }
    public function sceances()
    {

    }
}
