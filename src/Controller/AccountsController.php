<?php

namespace App\Controller;

use Cake\I18n\Time;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;


class AccountsController extends AppController
{

    public function accueil()
    {

    }

    public function classements()
    {
        $this->loadModel("Members");
        $this->loadModel("Logs");
        $this->loadModel("Workouts");

        $membres = $this->Members->find();
        $seances = $this->Workouts->find();
        $logs = $this->Logs->find();

        $this->set('membres', $membres->toArray());
        $this->set('seances', $seances->toArray());
        $this->set('logs', $logs->toArray());
    }

    public function connexion()
    {
      /*if($this->request->is('POST') && !empty($this->request->data("email"))){

        $this->Flash->success($this->request->data("email"));
        $this->Flash->success($this->request->data("password"));
      }
      if($this->request->is('POST') && isset($this->request->data("submit_inscription")) ){
        $this->Form->submit("S'inscrire", array('name' => 'submit_inscription'))
        $d = $this->request->data;
        if($this->User->save($d, true, array('email_inscription','password_inscription'))){
          $this->Session->setFlash("Votre compte a bien été crée", "notif");
        }else {
          $this->Session->setFlash("Merci de vérifier les informations", "notif", array('type'=>'error'));
        }
        $this->Flash->success($this->request->data("email_inscription"));
        $this->Flash->success($this->request->data("password_inscription"));
      }*/
    }

    public function monCompte()
    {
        $this->loadModel("Members");
        $membres = $this->Members->find()
            ->where(['id' => "56eb38b4-04b0-4667-ba54-0796b38f37ff"]);
        $dir=new Folder(WWW_ROOT.'img/PhotoProfil');

        if(isset($this->request->data['changePicture']))
        {
            $extension=strtolower(pathinfo($this->request->data['photo']['name'],PATHINFO_EXTENSION));
            if(!empty($this->request->data['photo']['tmp_name'])&&in_array($extension,array('jpg','jpeg','png')))
            {
              $files=$dir->find('56eb38b4-04b0-4667-ba54-0796b38f37ff'.'\.(?:jpg|jpeg|png)$');
              if(!empty($files))
              {
                foreach($files as $file)
                {
                  $file=new File($dir->pwd().DS.$file);
                  $file->delete();
                  $file->close();
                }
              }
              move_uploaded_file($this->request->data['photo']['tmp_name'],'img/PhotoProfil/'.DS.'56eb38b4-04b0-4667-ba54-0796b38f37ff'.'.'.$extension);
            }
            else {
              $this->Flash->error(__("Erreur lors de la modification"));
            }
        }
        $files = $dir->find('56eb38b4-04b0-4667-ba54-0796b38f37ff'.'\.(?:jpg|jpeg|png)$');
        if(empty($files))$user_image_extension="none";
        else $user_image_extension=strtolower(pathinfo($files[0],PATHINFO_EXTENSION));

        //verifie si l'utilisateur a une photo
        if(file_exists(WWW_ROOT.'img/PhotoProfil/56eb38b4-04b0-4667-ba54-0796b38f37ff'.'.'.$user_image_extension)){$adressePhoto='PhotoProfil/56eb38b4-04b0-4667-ba54-0796b38f37ff'.'.'.$user_image_extension;}
        else {$adressePhoto='PhotoProfil/default.jpg';}
        //renvoie l'adresse de l'image et les infos utilisateurs
        $this->set("adressePhoto", $adressePhoto);
        $this->set("membres", $membres->toArray());
    }

    public function objetsConnectes()
    {

    }

    public function seances()
    {
      //Date et heure actuelles
      $actual_time=Time::now();
      $actual_time->timezone = 'Europe/Paris';
      //$actual_time->modify('+5 years');

      //liste des sports
      $listSport=["Jogging", "Entraînement", "Football", "Tennis", "Squash", "Ping-Pong", "Fitness", "Voleyball",
      "Handball", "Piscine", "Boxe", "Gymnastique", "Badminton", "Golf","Basketball", "Waterpolo", "Aquagym", "Equitation"];

      $this->loadModel("Workouts");
      $seancesFuturs = $this->Workouts->find()->where(["date >"=>$actual_time])->order(['date'=>'DESC']);
      $seancesActuelles = $this->Workouts->find()->where(["date <"=>$actual_time])->andWhere(["end_date >"=>$actual_time])->order(['date'=>'DESC']);
      $seancesPassees = $this->Workouts->find()->where(["date <"=>$actual_time])->andWhere(["end_date <"=>$actual_time])->order(['date'=>'DESC']);

      $this->loadModel("Logs");
      $logs=$this->Logs->find();
      //envoie variable au ctp
      $this->set('seancesFuturs',$seancesFuturs->toArray() );
      $this->set('seancesActuelles',$seancesActuelles->toArray() );
      $this->set('seancesPassees',$seancesPassees->toArray() );
      $this->set('actual_time',$actual_time);
      $this->set('listSport',$listSport);
      $this->set("logs",$logs);

      //Formulaire Nouvelle séance
      $newWorkout=$this->Workouts->newEntity();
      if(isset($this->request->data["AddSeance"]))//Bouton du formulaire ajouter seance ?
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

        //envoie à la bdd
        $newWorkout->location_name=$lieu;
        $newWorkout->description=$details;
        $newWorkout->sport=$listSport[$sport];
        $newWorkout->member_id="54546854564";
        $newWorkout->date=$dateTamp;
        $newWorkout->end_date=$dateFin;
        $this->Workouts->save($newWorkout);
      return $this->redirect($this->here);
      }

      //Formulaire Ajout relevé
      $newLog=$this->Logs->newEntity();
      if(isset($this->request->data["AddReleve"]))//Bouton des formulaires ajouter relevé ?
      {
        $idSeance=$this->request->data("workoutId");
        $releve=$this->request->data("releve");
        $value=$this->request->data("value");
        $latitude=$this->request->data("latitude");
        $longitude=$this->request->data("longitude");

        //envoie à la bdd
        $newLog->member_id="54546854564";
        $newLog->workout_id=$idSeance;
        $newLog->device_id="33333";
        $newLog->date=$actual_time;
        $newLog->location_latitude=$latitude;
        $newLog->location_logitude=$longitude;
        $newLog->log_type=$releve;
        $newLog->log_value=$value;
        $this->Logs->save($newLog);
      }
    }

    public function competitions()
    {
      //Date et heure actuelles
      $actual_time=Time::now();
      $actual_time->timezone = 'Europe/Paris';
      //$actual_time->modify('+5 years');

      //liste des sports
      $listSport=["Jogging", "Entraînement", "Football", "Tennis", "Squash", "Ping-Pong", "Fitness", "Voleyball",
      "Handball", "Piscine", "Boxe", "Gymnastique", "Badminton", "Golf","Basketball", "Waterpolo", "Aquagym", "Equitation"];

      $this->loadModel("Contests");
      $contests=$this->Contests->find();
      $this->set("contests",$contests->toArray());
      $this->set('listSport',$listSport);


      //Formulaire Nouvelle séance
      $newContest=$this->Contests->newEntity();
      if(isset($this->request->data["AddContest"]))//Bouton du formulaire ajouter seance ?
      {
        $name=$this->request->data("name");
        $sport=$this->request->data("sport");
        $description=$this->request->data("description");
        //$details=$this->request->data("descriptions");

        //envoie à la bdd
        $newContest->name=$name;
        $newContest->type=$listSport[$sport];
        $newContest->description=$description;

        $this->Contests->save($newContest);
      return $this->redirect($this->here);
      }
    }
    public function singleCompetition($id_contest)
    {
      //Date et heure actuelles
      $actual_time=Time::now();
      $actual_time->timezone = 'Europe/Paris';

      //Load models
        //Workouts
      $this->loadModel("Workouts");
      $workouts=$this->Workouts->find("all");

        //Members
      $this->loadModel("Members");
      $members=$this->Members->find("all");
      $membres = $this->Members->find();
      $ListMembre=array();
      foreach($membres as $membre){array_push($ListMembre,$membre->email);}

        //Contests
      $this->loadModel("Contests");
      $contests=$this->Contests->find("all");

      //Formulaire Nouveau match
      $newMatch1=$this->Workouts->newEntity();
      $newMatch2=$this->Workouts->newEntity();
      if(isset($this->request->data["AddMatch"]))//Bouton du formulaire ajouter Match ?
      {
        $date=$this->request->data("date");
        $heure=$this->request->data("heure");
        $duree=$this->request->data("duree");
        $lieu=$this->request->data("lieu");
        $J1=$this->request->data("J1");
        $J2=$this->request->data("J2");


        //preparation pour end-date
        $dateTamp=$date['year']."-".$date['month']."-".$date['day']." ".$heure['hour'].":".$heure["minute"];
        $dateDepartTimestamp = strtotime($dateTamp);
        $dateFin = date('Y-m-d H:i:s', strtotime('+'.$duree.'minutes', $dateDepartTimestamp ));

        //envoie à la bdd
        $newMatch1->member_id=$membres->get('email')->where(['email'=>$J1]);
        $newMatch1->date=$dateTamp;
        $newMatch1->end_date=$dateFin;
        $newMatch1->location_name=$lieu;
        $newMatch1->description=" ";
        $newMatch1->sport=$contests->get('type')->where(['id'=>$id_contest]);
        $newMatch1->contest_id=$id_contest;
        $this->Workouts->save($newMatch1);



      return $this->redirect($this->here);
      }

      //on envoie les données
      $this->set('id_contest',$id_contest);
      $this->set('actual_time',$actual_time);
      $this->set('ListMembre',$ListMembre);

    }
}
