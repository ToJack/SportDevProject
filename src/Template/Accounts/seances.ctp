<section class="col-xs-4 col-xs-offset-4 titre">
  <h1 class='text-center'>Mes séances</h1>
</section>
<div class='col-xs-12'>

<?php if($seancesFuturs==null && $seancesPassees==null && $seancesActuelles==null) echo "<h2>Aucune séance</h2>"?>

<!---Premier tableau--->
<?php if($seancesActuelles!=null)echo "<h2>Séances en cours</h2>

<table class='table'>
  <tr>
    <th>Jour</th>
    <th>Heure</th>
    <th>Sport</th>
    <th>Lieu</th>
    <th>Détails</th>
    <th>Relevé</th>
    <th></th>
  </tr>";
  foreach($seancesActuelles as $seance){
    //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
    if($seance->date->hour<10) $heure_start="0".$seance->date->hour; else $heure_start=$seance->date->hour;
    if($seance->date->minute<10) $minute_start="0".$seance->date->minute; else $minute_start=$seance->date->minute;
    if($seance->end_date->hour<10) $heure_end="0".$seance->end_date->hour; else $heure_end=$seance->end_date->hour;
    if($seance->end_date->minute<10) $minute_end="0".$seance->end_date->minute; else $minute_end=$seance->end_date->minute;
    //relevé
    $premier_releve=1;
    //affichage
    echo "<tr>
      <td>".$seance->date->day."/".$seance->date->month."/".$seance->date->year."</td>
      <td>".$heure_start."h".$minute_start." - ".$heure_end."h".$minute_end."</td>
      <td>".$seance->sport."</td>
      <td>".$seance->location_name."</td>
      <td>".$seance->description."</td>";
      foreach($logs as $log){
        if(($log->workout_id==$seance->id)&&($premier_releve!=1)){
          echo "</td></tr><tr><td></td><td></td><td></td><td></td><td></td><td>".$log->log_type." : ".$log->log_value."</td><td>";
          $premier_releve=0;
        }
        if(($log->workout_id==$seance->id)&&($premier_releve==1)){
          echo "<td>".$log->log_type." : ".$log->log_value."</td><td>";
          $premier_releve=0;
        }
      }
      $jour=$seance->date->day;
      $mois=$seance->date->month;
      $annee=$seance->date->year;
      $sport=$seance->sport;
      $lieu=$seance->location_name;
      if($premier_releve==1)echo "<td></td><td><i class='glyphicon glyphicon-plus' onclick='AfficherForm($seance, $heure_start,$minute_start,$heure_end,$minute_end);'></i></td>";
      else echo " <i class='glyphicon glyphicon-plus' onclick='AfficherForm($seance, $heure_start,$minute_start,$heure_end,$minute_end);'></i></td>";
    echo "</tr>";
  }

if($seancesActuelles!=null)echo "</table>"?>

<!---Formulaires--->

<?php
echo "<div class='col-xs-12'>
        <div class='col-xs-12 col-sm-6'>",
          "<h2>Ajouter une séance</h2>",
             $this->Form->create(),
             $date=$this->Form->control('date', ['type' => 'date','minYear'=>$actual_time->year,"label"=>"Date :",'required' => true  ]),
             $this->Form->control('heure', ['type' => 'time',"label"=>"Heure : ",'default'=>$actual_time->hour.":".$actual_time->minute,'required' => true]),
             $this->Form->control('duree', ['type' => 'number','min'=>0,'max'=>1439,'default'=>'60',"label"=>"Durée (en min) : ",'required' => true]),
             $this->Form->control('sport', ['type' => 'select'  ,"options"=>$listSport,'empty' => 'Choisissez',"label"=>"Sport : ",'required' => true] ),
             $this->Form->control('lieu', ['type' => 'text',"label"=>"Lieu : ",'required' => true]),
             $this->Form->control('details', ['type' => 'textarea',"label"=>"Détails : "]),
             $this->Form->submit("Valider ma séance",array('name' => 'AddSeance')),
             $this->Form->end(),
        "</div>",


//Ajouter Relevé
        "<div id='FormReleve' class='col-xs-12 col-sm-6' style='display:none;'>
            <h2>Ajouter un relevé à une séance</h2>",
            "<div id='seanceReleve'></div>",
            $this->Form->create(),
            $this->Form->control('workoutId', ['type' => 'number','style' => 'display:none',"id"=>'idSeance','label'=>false]),
            $this->Form->control('latitude', ['type' => 'decimal',"label"=>"Latitude : ",'required' => true]),
            $this->Form->control('longitude', ['type' => 'decimal',"label"=>"Longitude : ",'required' => true]),
            $this->Form->control('releve', ['type' => 'text',"label"=>"Relevé : ",'required' => true]),
            $this->Form->control('value', ['type' => 'number',"label"=>"Valeur : ",'required' => true]),
            $this->Form->submit("Ajouter relevé",array('name' => 'AddReleve')),
            $this->Form->end(),
        "</div>",
    "</div>";
?>

<!---Deuxieme tableau--->

<?php if($seancesFuturs!=null)echo "<h2>Séances à venir</h2>

<table class='table'>
  <tr>
    <th>Jour</th>
    <th>Heure</th>
    <th>Sport</th>
    <th>Lieu</th>
    <th>Détails</th>
    <th>Relevé</th>
  </tr>";
  foreach($seancesFuturs as $seance){
    //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
    if($seance->date->hour<10) $heure_start="0".$seance->date->hour; else $heure_start=$seance->date->hour;
    if($seance->date->minute<10) $minute_start="0".$seance->date->minute; else $minute_start=$seance->date->minute;
    if($seance->end_date->hour<10) $heure_end="0".$seance->end_date->hour; else $heure_end=$seance->end_date->hour;
    if($seance->end_date->minute<10) $minute_end="0".$seance->end_date->minute; else $minute_end=$seance->end_date->minute;
    //relevé
    $premier_releve=1;
    //affichage
    echo "<tr>
      <td>".$seance->date->day."/".$seance->date->month."/".$seance->date->year."</td>
      <td>".$heure_start."h".$minute_start." - ".$heure_end."h".$minute_end."</td>
      <td>".$seance->sport."</td>
      <td>".$seance->location_name."</td>
      <td>".$seance->description."</td>";
      foreach($logs as $log){
        if(($log->workout_id==$seance->id)&&($premier_releve!=1)){
          echo "</tr><tr><td></td><td></td><td></td><td></td><td></td><td>".$log->log_type." : ".$log->log_value."</td>";
          $premier_releve=0;
        }
        if(($log->workout_id==$seance->id)&&($premier_releve==1)){
          echo "<td>".$log->log_type." : ".$log->log_value."</td>";
          $premier_releve=0;
        }
      }
      if($premier_releve==1)echo "<td></td>";

    echo "</tr>";
  }
if($seancesFuturs!=null)echo "</table>"?>

<!---Troisième tableau--->

<?php if($seancesPassees!=null)echo "<h2>Séances passées</h2>

<table class='table'>
  <tr>
    <th>Jour</th>
    <th>Heure</th>
    <th>Sport</th>
    <th>Lieu</th>
    <th>Détails</th>
    <th>Relevé</th>
    <th></th>
  </tr>";
  foreach($seancesPassees as $seance){
    //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
    if($seance->date->hour<10) $heure_start="0".$seance->date->hour; else $heure_start=$seance->date->hour;
    if($seance->date->minute<10) $minute_start="0".$seance->date->minute; else $minute_start=$seance->date->minute;
    if($seance->end_date->hour<10) $heure_end="0".$seance->end_date->hour; else $heure_end=$seance->end_date->hour;
    if($seance->end_date->minute<10) $minute_end="0".$seance->end_date->minute; else $minute_end=$seance->end_date->minute;
    //relevé
    $premier_releve=1;
    //affichage
    echo "<tr>
      <td>".$seance->date->day."/".$seance->date->month."/".$seance->date->year."</td>
      <td>".$heure_start."h".$minute_start." - ".$heure_end."h".$minute_end."</td>
      <td>".$seance->sport."</td>
      <td>".$seance->location_name."</td>
      <td>".$seance->description."</td>";
      foreach($logs as $log){
        if(($log->workout_id==$seance->id)&&($premier_releve!=1)){
          echo "</td></tr><tr><td></td><td></td><td></td><td></td><td></td><td>".$log->log_type." : ".$log->log_value."</td><td>";
          $premier_releve=0;
        }
        if(($log->workout_id==$seance->id)&&($premier_releve==1)){
          echo "<td>".$log->log_type." : ".$log->log_value."</td><td>";
          $premier_releve=0;
        }
      }
      $jour=$seance->date->day;
      $mois=$seance->date->month;
      $annee=$seance->date->year;
      $sport=$seance->sport;
      $lieu=$seance->location_name;
      if($premier_releve==1)echo "<td></td><td><i class='glyphicon glyphicon-plus' onclick='AfficherForm($seance, $heure_start,$minute_start,$heure_end,$minute_end);'></i></td>";
      else echo " <i class='glyphicon glyphicon-plus' onclick='AfficherForm($seance, $heure_start,$minute_start,$heure_end,$minute_end);'></i></td>";
    echo "</tr>";
  }

if($seancesPassees!=null)echo "</table>"?>

</div>
