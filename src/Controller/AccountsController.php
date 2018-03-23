<?php

namespace App\Controller;

use Cake\I18n\Time;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;


class AccountsController extends AppController
{

    public function accueil()
    {
      $memberId=$this->Auth->user('id');

      $this->set("test", $memberId);
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
      }
      $this->loadModel("Members");
      $members=$this->Members->find();

      //Formulaire nouveau membre
      $newMember=$this->Members->newEntity();
      if(isset($this->request->data["AddMember"]))
      {
        //attribution des valeurs
        $email_inscription=$this->request->data("email_inscription");
        $password_inscription=$this->request->data("password_inscription");

        //envoie à la bdd
        $newMember->email=$email_inscription;
        $newMember->password=$password_inscription;
        $this->Members->save($newMember);
      return $this->redirect($this->here);
<<<<<<< HEAD
    }*/

=======
      }
>>>>>>> 6845ff94021e24e8fd1a1e3b095ba21c65971819
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

//Fonctions pour singleCompetition
    public function ScoreMatch($id,$joueur)
    {
      $condition=$this->Logs->find()->where(["workout_id ="=>$id, 'OR'=>["log_type"=>"Points","log_type"=>"points"]]);
      if($condition->toArray()!=null)
      {$score="J".$joueur."(".$condition->first()->log_value.")";}
      else {$score="J".$joueur."(-)";}
      return $score;
    }
    public function StatutMatch($score,$id)
    {
      $condition=$this->Logs->find()->where(["workout_id ="=>$id, 'OR'=>["log_type"=>"Points","log_type"=>"points"]]);
      if(($score!="J1(-)")&&($condition->toArray()!=null))
      {$statut="Match Terminé";}
      else {$statut="Match en Cours";}
      return $statut;
    }
    public function PointsMatch($score,$joueur,$point)
    {
      //Point Joueur 1
      $pointJoueur1=strstr($score,'(');
      $pointJoueur1 = ltrim($pointJoueur1, "(");
      $pointJoueur1=strstr($pointJoueur1,')',true);
      //Point Joueur 2
      $pointJoueur2=strstr($score,'(');
      $pointJoueur2 = ltrim($pointJoueur2, "(");
      $pointJoueur2=strstr($pointJoueur2,'(');
      $pointJoueur2 = ltrim($pointJoueur2, "(");
      $pointJoueur2=strstr($pointJoueur2,')',true);

      //Gagné ?
      if($joueur==1){
        if($pointJoueur1>$pointJoueur2)$point+=3;
        elseif($pointJoueur1<$pointJoueur2)$point+=1;
      }
      if($joueur==2){
        if($pointJoueur1<$pointJoueur2)$point+=3;
        elseif($pointJoueur1>$pointJoueur2)$point+=1;
      }
      if($pointJoueur1==$pointJoueur2)$point+=2;
      return $point;
    }
    function build_sorter($key) {
    	return function ($a, $b) use ($key) {
    		return strnatcmp($b[$key], $a[$key]);
    	};
    }

    public function singleCompetition($id_contest)
    {
      //Date et heure actuelles
      $actual_time=Time::now();
      $actual_time->timezone = 'Europe/Paris';

      //liste des sports
      $listSport=["Jogging", "Entraînement", "Football", "Tennis", "Squash", "Ping-Pong", "Fitness", "Voleyball",
      "Handball", "Piscine", "Boxe", "Gymnastique", "Badminton", "Golf","Basketball", "Waterpolo", "Aquagym", "Equitation"];

      //Logs
      $this->loadModel("Logs");

      //Workouts
      $this->loadModel("Workouts");
      $matchs=$this->Workouts->find()->where(['contest_id ='=>$id_contest])->order(['id'=>'DESC']);

      //Members
      $this->loadModel("Members");
      $membres = $this->Members->find();
      $ListMembre=array();
      foreach($membres as $membre){array_push($ListMembre,$membre->email);}

      //Contests
      $this->loadModel("Contests");
      $thisContests=$this->Contests->find()->where(['id ='=>$id_contest])->first();

      //Formulaire Nouveau match
      $newMatch=$this->Workouts->newEntity();
      $newMatch2=$this->Workouts->newEntity();
      if(isset($this->request->data["AddMatch"]))//Bouton du formulaire ajouter Match ?
      {
        //recupère data
        $date=$this->request->data("date");
        $heure=$this->request->data("heure");
        $duree=$this->request->data("duree");
        $lieu=$this->request->data("lieu");
        $J1=$this->request->data("J1");
        $J2=$this->request->data("J2");

        //preparation $membres
        $J1Id=$this->Members->find()->where(['email ='=>$ListMembre[$J1]])->first();
        $J2Id=$this->Members->find()->where(['email ='=>$ListMembre[$J2]])->first();

        //preparation pour end-date
        $dateTamp=$date['year']."-".$date['month']."-".$date['day']." ".$heure['hour'].":".$heure["minute"];
        $dateDepartTimestamp = strtotime($dateTamp);
        $dateFin = date('Y-m-d H:i:s', strtotime('+'.$duree.'minutes', $dateDepartTimestamp ));


        $newMatch->date=$dateTamp;
        $newMatch->end_date=$dateFin;
        $newMatch->location_name=$lieu;
        $newMatch->description=" ";
        $newMatch->sport=$listSport[$thisContests->id];
        $newMatch->contest_id=$id_contest;

        $newMatch2->date=$dateTamp;
        $newMatch2->end_date=$dateFin;
        $newMatch2->location_name=$lieu;
        $newMatch2->description=" ";
        $newMatch2->sport=$listSport[$thisContests->id];
        $newMatch2->contest_id=$id_contest;
        //envoie à la bdd joueur 1
        $newMatch->member_id=$J1Id->id;
        $this->Workouts->save($newMatch);
        //envoie à la bdd joueur 2
        $newMatch2->member_id=$J2Id->id;
        $this->Workouts->save($newMatch2);

        return $this->redirect($this->here);
      }

      $participants=array();
      //preparation affichage matchs
      $ListMatchs=array();
      $i=2;
      foreach($matchs as $match){
        $email=$this->Members->find()->where(['id ='=>$match->member_id])->first()->email;
        //ajout dans la liste participant si pas encore présent pour le classement
        $participantPresent=0;
        foreach($participants as $participant){if($participant[0]==$email)$participantPresent=1;}
        if($participantPresent!=1)array_push($participants,array($email,0));

        if(!($i%2))
        {
          //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
          if($match->date->hour<10) $heure_start="0".$match->date->hour; else $heure_start=$match->date->hour;
          if($match->date->minute<10) $minute_start="0".$match->date->minute; else $minute_start=$match->date->minute;
          if($match->end_date->hour<10) $heure_end="0".$match->end_date->hour; else $heure_end=$match->end_date->hour;
          if($match->end_date->minute<10) $minute_end="0".$match->end_date->minute; else $minute_end=$match->end_date->minute;

          $score=$this->ScoreMatch($match->id,1);
          //$statut=StatutMatch();
          array_push($ListMatchs,array(
            $email,
            " ",
            $match->date->day."/".$match->date->month."/".$match->date->year,
            $heure_start."h".$minute_start." - ".$heure_end."h".$minute_end,
            $match->location_name,
            $score,
            ""
                ));
        }
        else{
          $ListMatchs[(($i)/2)-1][1]=$email;
          $ListMatchs[(($i)/2)-1][5]=$ListMatchs[(($i)/2)-1][5]." / ".$this->ScoreMatch($match->id,2);
          $ListMatchs[(($i)/2)-1][6]=$this->StatutMatch($score,$match->id);
        }
        $i+=1;
      }
      //Preparation affichage classements
      $classements=array();
      foreach($ListMatchs as $match){
        if($match[6]=="Match Terminé"){
          foreach($participants as &$participant){
            if($match[0]==$participant[0])
            {
              $participant[1]=$this->PointsMatch($match[5],1,$participant[1]);
            }
            elseif ($match[1]==$participant[0]) {
              $participant[1]=$this->PointsMatch($match[5],2,$participant[1]);
            }
          }
        }
      }
      //On classe les participants du meilleur au moins bon
      usort($participants, $this->build_sorter(1));

      //on envoie les données
      $this->set('name_contest',$thisContests->name);
      $this->set('actual_time',$actual_time);
      $this->set('ListMembre',$ListMembre);

      $this->set('matchs',$ListMatchs);
      $this->set('membres',$membres);
      $this->set('classements',$participants);
    }


    public function faq()
    {

    }
    public function contact()
    {

    }
    public function equipe()
    {

    }

}
