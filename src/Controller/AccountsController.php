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
        $this->Flash->success($this->request->data("password"));
      }
      if($this->request->is('POST')){
        $this->Flash->success($this->request->data("Pseudo"));
        $this->Flash->success($this->request->data("Name"));
        $this->Flash->success($this->request->data("Family Name"));
        $this->Flash->success($this->request->data("imail"));
        $this->Flash->success($this->request->data("confirm imail"));
        $this->Flash->success($this->request->data("ipassword"));
        $this->Flash->success($this->request->data("confirm ipassword"));
      }
<<<<<<< HEAD
=======

>>>>>>> 7fbc662394224d41ea4d2d19df69d3383227dad7
    }
    public function monCompte()
    {
      $this->loadModel("Members");

      $membres = $this->Members->find();

      $this->set('membres',$membres->toArray() );

    }
    public function objetsConnectes()
    {

    }
    public function sceances()
    {

    }
}
