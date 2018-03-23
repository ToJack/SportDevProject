<?php
    namespace App\Controller;

    use App\Controller\AppController;
    use Cake\I18n\Time;


    class ApiController extends AppController
    {
      public function registerDevice($id_membre, $id_device, $description)
      {
        $this->loadModel("Devices");
        $this->loadModel("Members");
        $this->viewbuilder()->className('Json');

        //membre existant ?
        $membre=$this->Members->find()->where(['id'=>$id_membre])->first();

        if($membre)
        {
          $newDevice=$this->Devices->newEntity();
          $newDevice->member_id=$id_membre;
          $newDevice->serial=$id_device;
          $newDevice->description=$description;
          $newDevice->trusted=0;
          $this->Devices->save($newDevice);

          $this->set(array('Device'=>$newDevice, '_serialize'=>array('Device')));
        }
        else{
          $this->Flash->error(__("Ce membre n'existe pas"));
          return $this->redirect(['controller'=>'Accounts', 'action'=>'accueil']);
        }
      }

      public function workoutParameters($id_device, $id_seance)
      {
        $this->loadModel("Devices");
        $this->loadModel("Workouts");
        $this->loadModel("Logs");
        $this->viewbuilder()->className('Json');

        //seance existante ?
        $seance = $this->Workouts->find()->where(['id'=>$id_seance])->first();
        //device vérifié ?
        if($seance)$device=$this->Devices->find()->where(["serial"=>$id_device])->andWhere(['trusted'=>1])->andWhere(['member_id'=>$seance->member_id])->first();

        if(($seance)&&($device))
        {
          //On prends les logs de la seance
          $logs_seance = $this->Logs->find()->where(['workout_id'=>$id_seance]);
          //stocke les logs dans un array
          $scores=array();
          foreach($logs_seance as $log_seance)
          {
            array_push($scores,$log_seance->log_type." : ".$log_seance->log_value);
          }
          $this->set(array('scores'=>$scores, '_serialize'=>array('scores')));
        }
        else {
          if(!$seance)$this->Flash->error(__("La séance n'existe pas"));
          elseif(!$device)$this->Flash->error(__("Le device n'existe pas, n'est pas validé ou n'appartient pas au propriétaire de cette séance, aucun log ajouté"));

          return $this->redirect(['controller'=>'Accounts', 'action'=>'accueil']);
        }
      }

      public function getsummary($id_device)
      {
        //Date et heure actuelles
        $actual_time=Time::now();
        $actual_time->timezone = 'Europe/Paris';

        $this->loadModel("Devices");
        $this->loadModel("Workouts");
        $this->loadModel("Logs");
        $this->viewbuilder()->className('Json');

        //device vérifié ?
        $device=$this->Devices->find()->where(["serial"=>$id_device])->andWhere(['trusted'=>1])->first();

        if($device)
        {
          //On prend l'id Membre lié à l'objet
          $id_membre = $device->member_id;
          $seancesPassees = $this->Workouts->find()->where(["date <"=>$actual_time])
          ->andWhere(["end_date <"=>$actual_time])->andWhere(['member_id'=>$id_membre])->order(['date'=>'DESC']);

          //Les 3 dernières desciptions
          $lastSeances=array();
          $i=1;
          foreach($seancesPassees as $seance)
          {
            if($i<4)array_push($lastSeances,/*"Description seance du ".$seance->date." :".*/$seance->description);
            $i++;
          }

          //Prochaine séance
          $NextSeance = $this->Workouts->find()->where(["date >"=>$actual_time])->andWhere(['member_id'=>$id_membre])->order(['date'=>'DESC'])->last();

          //on met les infos dans un tableau
          $infos=array(array('Description'=>$lastSeances),array('NextSeance'=>$NextSeance));

          //envoie tableau info
          $this->set(array('Infos'=>$infos, '_serialize'=>array('Infos')) );
        }
        else {
          if(!$device)$this->Flash->error(__("Le device n'existe pas ou n'est pas validé"));
          return $this->redirect(['controller'=>'Accounts', 'action'=>'accueil']);
        }
      }

      public function addlog($id_device, $id_seance, $id_membre, $log_type, $log_value)
      {
        //Date et heure actuelles
        $actual_time=Time::now();
        $actual_time->timezone = 'Europe/Paris';

        $this->loadModel("Devices");
        $this->loadModel("Logs");
        $this->loadModel("Workouts");
        $this->loadModel("Members");
        $this->viewbuilder()->className('Json');

        //membre existant ?
        $membre=$this->Members->find()->where(['id'=>$id_membre])->first();
        //seance existante ?
        $seance=$this->Workouts->find()->where(["id"=>$id_seance])->andWhere(['member_id'=>$id_membre])->first();

        //device vérifié ?
        $device=$this->Devices->find()->where(["serial"=>$id_device])->andWhere(['member_id'=>$id_membre])->andWhere(['trusted'=>1])->first();
        if(($membre)&&($seance)&&($device))
        {
          $newLog=$this->Logs->newEntity();
          //envoie à la bdd
          $newLog->member_id=$id_membre;
          $newLog->workout_id=$id_seance;
          $newLog->device_id=$device->id;
          $newLog->date=$actual_time;
          $newLog->location_latitude='0';
          $newLog->location_logitude='0';
          $newLog->log_type=$log_type;
          $newLog->log_value=$log_value;
          $this->Logs->save($newLog);
          $this->set(array('Releve'=>$newLog, '_serialize'=>array('Releve')) );
        }
        else {
          if(!$membre)$this->Flash->error(__("Ce membre n'existe pas, aucun log ajouté"));
          elseif(!$seance)$this->Flash->error(__("La séance n'existe pas, aucun log ajouté"));
          elseif(!$device)$this->Flash->error(__("Le device n'existe pas ou n'est pas validé, aucun log ajouté"));

          return $this->redirect(['controller'=>'Accounts', 'action'=>'accueil']);
        }
      }
    }
