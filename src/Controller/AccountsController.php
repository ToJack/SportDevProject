<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;


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
    public function seances()
    {
      $actual_time=Time::now();
      $actual_time->timezone = 'Europe/Paris';
      //$actual_time->modify('+5 years');
      $this->loadModel("Workouts");
      $seancesFuturs = $this->Workouts->find()->where(["date >"=>$actual_time])->order(['date'=>'DESC']);
      $seancesActuelles = $this->Workouts->find()->where(["date <"=>$actual_time])->andWhere(["end_date >"=>$actual_time])->order(['date'=>'DESC']);
      $seancesPassees = $this->Workouts->find()->where(["date <"=>$actual_time])->andWhere(["end_date <"=>$actual_time])->order(['date'=>'DESC']);
      $this->set('seancesFuturs',$seancesFuturs->toArray() );
      $this->set('seancesActuelles',$seancesActuelles->toArray() );
      $this->set('seancesPassees',$seancesPassees->toArray() );
      $this->set('actual_time',$actual_time );

      //Formulaire Nouvelle séance
      $new=$this->Workouts->newEntity();
      if($this->request->is("post"))//Request post ou non ?
      {
        $date=$this->request->data("date");
        $heure=$this->request->data("heure");
        $duree=$this->request->data("duree");
        $sport=$this->request->data("sport");
        $lieu=$this->request->data("lieu");
        $details=$this->request->data("details");

        //preparation pour end-date
        $dateTamp=$date['year']."-".$date['month']."-".$date['day']." ".$heure['hour'].":".$heure["minute"];
        $dateDepartTimestamp = strtotime($dateTamp);
        $dateFin = date('Y-m-d H:i:s', strtotime('+'.$duree.'minutes', $dateDepartTimestamp ));

        $new->location_name=$lieu;
        $new->description=$details;
        $new->sport=$sport;
        $new->member_id="54546854564";
        $new->date=$dateTamp;
        $new->end_date=$dateFin;
        $this->Workouts->save($new);
      /*$connection = ConnectionManager::get('default');
      $connection->insert('workouts', [
        'location_name' => $lieu,
        'description' => $details,
        'sport' => $sport,
        'member_id' => "56",
          'date' => "2015-12-30",
          'end_date'=>"2015-12-30"
      ]);*/
      }
    }
}
