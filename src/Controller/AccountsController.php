<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

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
    }
    public function monCompte()
    {
      $this->loadModel("Members");

      $membres = $this->Members->find()
      ->where(['id'=> "56eb38b4-04b0-4667-ba54-0796b38f37ff"]);
      $this->set("membres",$membres->toArray());
      foreach ($membres as $membres)
      {}
    }
    public function objetsConnectes()
    {

    }
    public function sceances()
    {
      $actual_time=Time::now();
      $actual_time->timezone = 'Europe/Paris';
      //$actual_time->modify('+5 years');
      $this->loadModel("Workouts");
      $sceancesFuturs = $this->Workouts->find()->where(["date >"=>$actual_time])->order(['date'=>'DESC']);
      $sceancesActuelles = $this->Workouts->find()->where(["date <"=>$actual_time])->andWhere(["end_date >"=>$actual_time])->order(['date'=>'DESC']);
      $sceancesPassees = $this->Workouts->find()->where(["date <"=>$actual_time])->andWhere(["end_date <"=>$actual_time])->order(['date'=>'DESC']);
      $this->set('sceancesFuturs',$sceancesFuturs->toArray() );
      $this->set('sceancesActuelles',$sceancesActuelles->toArray() );
      $this->set('sceancesPassees',$sceancesPassees->toArray() );
      //$this->set('actual_time',$actual_time );

    }
}
