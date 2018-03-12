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

      $membres = $this->Members->find()->select(['id','name'])->where(['id !='=>1])->order(['created'=>'DESC']);
      $this->set('membres',$membres->toArray() );

    }
    public function objetsConnectes()
    {

    }
    public function sceances()
    {

    }
}
