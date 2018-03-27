<section class='col-xs-4 col-xs-offset-4 titre'>
  <h1 class='text-center'><?=$name_contest?></h1>
</section>
<div class='col-xs-12'>

<?php if($matchs!=null)
{
  echo "<h2>Listes des matchs</h2>

  <table class='table'>
  <thead>
    <tr>
      <th>Joueur 1</th>
      <th>Joueur 2</th>
      <th>Jour</th>
      <th>Heure</th>
      <th>Lieu</th>
      <th>Score</th>
      <th>Statut</th>
    </tr>
  </thead>";

    foreach($matchs as $match){
      //affichage
      echo "<tr>
        <td>".$match[0]."</td>
        <td>".$match[1]."</td>
        <td>".$match[2]."</td>
        <td>".$match[3]."</td>
        <td>".$match[4]."</td>
        <td>".$match[5]."</td>
        <td>".$match[6]."</td>
        </tr>";
    }
}
else{echo "<h2 class='text-center'>Aucun match n'a eu lieu pour ce tournoi</h2>";}
if($matchs!=null)echo "</table> Pour ajouter un score à un match ajouter un relevé 'Points' à la séance"?>




<?php
echo "<div class='col-xs-12'>
        <div class='col-xs-12 col-sm-6 col-sm-offset-3 well'>
          <h2>Ajouter un match</h2>",
             $this->Form->create(),
             $this->Form->control('J1',['type' => 'select',"label"=>"Joueur 1 : ","options"=>$ListMembre,'empty' => 'Choisissez','required' => true, 'class'=>"form-control"]),
             $this->Form->control('J2',['type' => 'select',"label"=>"Joueur 2 : ","options"=>$ListMembre,'empty' => 'Choisissez','required' => true, 'class'=>"form-control"]),
             $this->Form->control('date', ['type' => 'date','minYear'=>$actual_time->year,"label"=>"Date :",'required' => true , 'class'=>"form-control"]),
             $this->Form->control('heure', ['type' => 'time',"label"=>"Heure : ",'default'=>$actual_time->hour.":".$actual_time->minute,'required' => true, 'class'=>"form-control"]),
             $this->Form->control('duree', ['type' => 'number','min'=>0,'max'=>1439,'default'=>'60',"label"=>"Durée (en min) : ",'required' => true, 'class'=>"form-control"]),
             $this->Form->control('lieu', ['type' => 'text',"label"=>"Lieu : ",'required' => true, 'class'=>"form-control"]),
             $this->Form->submit("Créer nouveau match",array('name' => 'AddMatch', 'class'=>"btn btn-primary")),
             $this->Form->end(),
         "</div>",
    "</div>";

?>

<?php if($classements!=null)
{
  echo "<h2>Classement</h2>

  <table class='table'>
    <thead>
      <tr>
        <th>Rang</th>
        <th>Joueur</th>
        <th>Points</th>
      </tr>
    </thead>";
    $rang=1;
    foreach($classements as $classement){
      //affichage
      echo "<tr>
        <td>".$rang."</td>
        <td>".$classement[0]."</td>
        <td>".$classement[1]."</td>";
      echo "</tr>";
      $rang++;
    }
}
if($classements!=null)echo "</table>";
?>
</div>
