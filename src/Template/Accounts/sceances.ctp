<h1>Mes scéances</h1>

<?php if($sceancesActuelles!=null)echo "<h2>Scéances en cours</h2>

<table class='table'>
  <tr>
    <th>Jour</th>
    <th>Heure</th>
    <th>Type</th>
    <th>Lieu</th>
    <th>Détails</th>
  </tr>";
  foreach($sceancesActuelles as $sceance){
    //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
    if($sceance->date->hour<10) $heure_start="0".$sceance->date->hour; else $heure_start=$sceance->date->hour;
    if($sceance->date->minute<10) $minute_start="0".$sceance->date->minute; else $minute_start=$sceance->date->minute;
    if($sceance->end_date->hour<10) $heure_end="0".$sceance->end_date->hour; else $heure_end=$sceance->end_date->hour;
    if($sceance->end_date->minute<10) $minute_end="0".$sceance->end_date->minute; else $minute_end=$sceance->end_date->minute;
    echo "<tr><td>".$sceance->date->day."/".$sceance->date->month."/".$sceance->date->year."</td><td>".$heure_start."h".$minute_start." - ".$heure_end."h".$minute_end."</td><td>".$sceance->sport."</td><td>".$sceance->location_name."</td><td>".$sceance->description."</td><tr>";
  }
if($sceancesActuelles!=null)echo "</table>"?>

<?php if($sceancesFuturs!=null)echo "<h2>Scéances à venir</h2>

<table class='table'>
  <tr>
    <th>Jour</th>
    <th>Heure</th>
    <th>Type</th>
    <th>Lieu</th>
    <th>Détails</th>
  </tr>";
  foreach($sceancesFuturs as $sceance){
    //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
    if($sceance->date->hour<10) $heure_start="0".$sceance->date->hour; else $heure_start=$sceance->date->hour;
    if($sceance->date->minute<10) $minute_start="0".$sceance->date->minute; else $minute_start=$sceance->date->minute;
    if($sceance->end_date->hour<10) $heure_end="0".$sceance->end_date->hour; else $heure_end=$sceance->end_date->hour;
    if($sceance->end_date->minute<10) $minute_end="0".$sceance->end_date->minute; else $minute_end=$sceance->end_date->minute;
    echo "<tr><td>".$sceance->date->day."/".$sceance->date->month."/".$sceance->date->year."</td><td>".$heure_start."h".$minute_start." - ".$heure_end."h".$minute_end."</td><td>".$sceance->sport."</td><td>".$sceance->location_name."</td><td>".$sceance->description."</td><tr>";
  }
if($sceancesFuturs!=null)echo "</table>"?>

<?php if($sceancesPassees!=null)echo "<h2>Scéances passées</h2>

<table class='table'>
  <tr>
    <th>Jour</th>
    <th>Heure</th>
    <th>Type</th>
    <th>Lieu</th>
    <th>Détails</th>
  </tr>";
  foreach($sceancesPassees as $sceance){
    //rajoute un 0 devant les heures et minutes <10 pour unifier l'affichage
    if($sceance->date->hour<10) $heure_start="0".$sceance->date->hour; else $heure_start=$sceance->date->hour;
    if($sceance->date->minute<10) $minute_start="0".$sceance->date->minute; else $minute_start=$sceance->date->minute;
    if($sceance->end_date->hour<10) $heure_end="0".$sceance->end_date->hour; else $heure_end=$sceance->end_date->hour;
    if($sceance->end_date->minute<10) $minute_end="0".$sceance->end_date->minute; else $minute_end=$sceance->end_date->minute;
    echo "<tr><td>".$sceance->date->day."/".$sceance->date->month."/".$sceance->date->year."</td><td>".$heure_start."h".$minute_start." - ".$heure_end."h".$minute_end."</td><td>".$sceance->sport."</td><td>".$sceance->location_name."</td><td>".$sceance->description."</td><tr>";
  }

if($sceancesPassees!=null)echo "</table>"?>
