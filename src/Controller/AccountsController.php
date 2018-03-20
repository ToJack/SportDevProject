<?php

namespace App\Controller;

use Cake\I18n\Time;


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
        if ($this->request->is('POST') && !empty($this->request->data("email"))) {
            $this->Flash->success($this->request->data("email"));
            $this->Flash->success($this->request->data("password"));
        }
        if ($this->request->is('POST') && !empty($this->request->data("imail"))) {
            $this->Flash->success($this->request->data("imail"));
            $this->Flash->success($this->request->data("confirmE"));
            $this->Flash->success($this->request->data("pswd"));
            $this->Flash->success($this->request->data("confirmP"));
        }
    }

    public function monCompte()
    {
        $this->loadModel("Members");

        $membres = $this->Members->find()
            ->where(['id' => "56eb38b4-04b0-4667-ba54-0796b38f37ff"]);
        $this->set("membres", $membres->toArray());
        foreach ($membres as $membres) {
        }
    }

    public function objetsConnectes()
    {

    }

    public function seances()
    {
        //Date et heure actuelles
        $actual_time = Time::now();
        $actual_time->timezone = 'Europe/Paris';
        //$actual_time->modify('+5 years');

        //liste des sports
        $listSport = ["Jogging", "Entraînement", "Football", "Tennis", "Squash", "Ping-Pong", "Fitness", "Voleyball",
            "Handball", "Piscine", "Boxe", "Gymnastique", "Badmington", "Golf", "Basketball", "Waterpolo", "Aquagym", "Equitation"];

        $this->loadModel("Workouts");
        $seancesFuturs = $this->Workouts->find()->where(["date >" => $actual_time])->order(['date' => 'DESC']);
        $seancesActuelles = $this->Workouts->find()->where(["date <" => $actual_time])->andWhere(["end_date >" => $actual_time])->order(['date' => 'DESC']);
        $seancesPassees = $this->Workouts->find()->where(["date <" => $actual_time])->andWhere(["end_date <" => $actual_time])->order(['date' => 'DESC']);

        $this->loadModel("Logs");
        $logs = $this->Logs->find();
        //envoie variable au ctp
        $this->set('seancesFuturs', $seancesFuturs->toArray());
        $this->set('seancesActuelles', $seancesActuelles->toArray());
        $this->set('seancesPassees', $seancesPassees->toArray());
        $this->set('actual_time', $actual_time);
        $this->set('listSport', $listSport);
        $this->set("logs", $logs);

        //Formulaire Nouvelle séance
        $newWorkout = $this->Workouts->newEntity();
        if (isset($this->request->data["AddSeance"]))//Bouton du formulaire ajouter seance ?
        {
            $date = $this->request->data("date");
            $heure = $this->request->data("heure");
            $duree = $this->request->data("duree");
            $sport = $this->request->data("sport");
            $lieu = $this->request->data("lieu");
            $details = $this->request->data("details");

            //preparation pour end-date
            $dateTamp = $date['year'] . "-" . $date['month'] . "-" . $date['day'] . " " . $heure['hour'] . ":" . $heure["minute"];
            $dateDepartTimestamp = strtotime($dateTamp);
            $dateFin = date('Y-m-d H:i:s', strtotime('+' . $duree . 'minutes', $dateDepartTimestamp));

            //envoie à la bdd
            $newWorkout->location_name = $lieu;
            $newWorkout->description = $details;
            $newWorkout->sport = $listSport[$sport];
            $newWorkout->member_id = "54546854564";
            $newWorkout->date = $dateTamp;
            $newWorkout->end_date = $dateFin;
            $this->Workouts->save($newWorkout);
            return $this->redirect($this->here);
        }

        //Formulaire Ajout relevé
        $newLog = $this->Logs->newEntity();
        if (isset($this->request->data["AddReleve"]))//Bouton des formulaires ajouter relevé ?
        {
            $idSeance = $this->request->data("workoutId");
            $releve = $this->request->data("releve");
            $value = $this->request->data("value");
            $latitude = $this->request->data("latitude");
            $longitude = $this->request->data("longitude");

            //envoie à la bdd
            $newLog->member_id = "54546854564";
            $newLog->workout_id = $idSeance;
            $newLog->device_id = "33333";
            $newLog->date = $actual_time;
            $newLog->location_latitude = $latitude;
            $newLog->location_logitude = $longitude;
            $newLog->log_type = $releve;
            $newLog->log_value = $value;
            $this->Logs->save($newLog);
        }
    }
}
