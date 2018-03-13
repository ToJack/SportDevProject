<h1>Mes séances</h1>

<?php if($seancesFuturs==null && $seancesPassees==null && $seancesActuelles==null) echo "<h2>Aucune séance</h2>"?>

<?php if($seancesActuelles!=null)echo "<h2>Séances en cours</h2>

<table class='table'>
  <tr>
    <th>Jour</th>
    <th>Heure</th>
    <th>Sport</th>
    <th>Lieu</th>
    <th>Détails</th>
  </tr>";
  foreach($seancesActuelles as $seance){
    //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
    if($seance->date->hour<10) $heure_start="0".$seance->date->hour; else $heure_start=$seance->date->hour;
    if($seance->date->minute<10) $minute_start="0".$seance->date->minute; else $minute_start=$seance->date->minute;
    if($seance->end_date->hour<10) $heure_end="0".$seance->end_date->hour; else $heure_end=$seance->end_date->hour;
    if($seance->end_date->minute<10) $minute_end="0".$seance->end_date->minute; else $minute_end=$seance->end_date->minute;
    echo "<tr><td>".$seance->date->day."/".$seance->date->month."/".$seance->date->year."</td><td>".$heure_start."h".$minute_start." - ".$heure_end."h".$minute_end."</td><td>".$seance->sport."</td><td>".$seance->location_name."</td><td>".$seance->description."</td><tr>";
  }
if($seancesActuelles!=null)echo "</table>"?>

<h2>Ajouter une séance</h2>

<?php
echo $this->Form->create(),

 $date=$this->Form->control('date', ['type' => 'date','minYear'=>$actual_time->year,"label"=>"Date :",'required' => true  ]),
 $this->Form->control('heure', ['type' => 'time',"label"=>"Heure : ",'default'=>$actual_time->hour.":".$actual_time->minute,'required' => true]),
 $this->Form->control('duree', ['type' => 'number','min'=>0,'default'=>'60',"label"=>"Durée (en min) : ",'required' => true]),
 $this->Form->control('sport', ['type' => 'select'  ,"options"=>["Jogging", "Entraînement", "Football", "Tennis", "Squash", "Ping-Pong", "Fitness", "Voleyball",
 "Handball", "Piscine", "Boxe", "Gymnastique", "Badmington", "Golf","Basketball", "Waterpolo", "Aquagym", "Equitation"],'empty' => 'Choisissez',"label"=>"Sport : ",'required' => true]),
 $this->Form->control('lieu', ['type' => 'text',"label"=>"Lieu : ",'required' => true]),
 $this->Form->control('details', ['type' => 'textarea',"label"=>"Détails : ",'required' => true]),

 $this->Form->submit("Valider ma séance"),
 $this->Form->end();
?>


<?php if($seancesFuturs!=null)echo "<h2>Séances à venir</h2>

<table class='table'>
  <tr>
    <th>Jour</th>
    <th>Heure</th>
    <th>Sport</th>
    <th>Lieu</th>
    <th>Détails</th>
  </tr>";
  foreach($seancesFuturs as $seance){
    //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
    if($seance->date->hour<10) $heure_start="0".$seance->date->hour; else $heure_start=$seance->date->hour;
    if($seance->date->minute<10) $minute_start="0".$seance->date->minute; else $minute_start=$seance->date->minute;
    if($seance->end_date->hour<10) $heure_end="0".$seance->end_date->hour; else $heure_end=$seance->end_date->hour;
    if($seance->end_date->minute<10) $minute_end="0".$seance->end_date->minute; else $minute_end=$seance->end_date->minute;
    echo "<tr><td>".$seance->date->day."/".$seance->date->month."/".$seance->date->year."</td><td>".$heure_start."h".$minute_start." - ".$heure_end."h".$minute_end."</td><td>".$seance->sport."</td><td>".$seance->location_name."</td><td>".$seance->description."</td><tr>";
  }
if($seancesFuturs!=null)echo "</table>"?>




<?php if($seancesPassees!=null)echo "<h2>Séances passées</h2>

<table class='table'>
  <tr>
    <th>Jour</th>
    <th>Heure</th>
    <th>Sport</th>
    <th>Lieu</th>
    <th>Détails</th>
  </tr>";
  foreach($seancesPassees as $seance){
    //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
    if($seance->date->hour<10) $heure_start="0".$seance->date->hour; else $heure_start=$seance->date->hour;
    if($seance->date->minute<10) $minute_start="0".$seance->date->minute; else $minute_start=$seance->date->minute;
    if($seance->end_date->hour<10) $heure_end="0".$seance->end_date->hour; else $heure_end=$seance->end_date->hour;
    if($seance->end_date->minute<10) $minute_end="0".$seance->end_date->minute; else $minute_end=$seance->end_date->minute;
    echo "<tr><td>".$seance->date->day."/".$seance->date->month."/".$seance->date->year."</td><td>".$heure_start."h".$minute_start." - ".$heure_end."h".$minute_end."</td><td>".$seance->sport."</td><td>".$seance->location_name."</td><td>".$seance->description."</td><tr>";
  }

if($seancesPassees!=null)echo "</table>"?>
