<?php if($matchs!=null)
{
  echo "<h2>".$name_contest."</h2>";

  echo "<h2>Listes des matchs</h2>

  <table class='table'>
    <tr>
      <th>Joueur 1</th>
      <th>Joueur 2</th>
      <th>Jour</th>
      <th>Heure</th>
      <th>Lieu</th>
      <th>Score</th>
      <th>Statut</th>
    </tr>";
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
        <td>"."</td>";
      echo "</tr>";
    }
}
if($matchs!=null)echo "</table> Pour ajouter un score à un match ajouter un relevé 'Points' à la séance"?>




<?php
echo "<div class='col-xs-12'>
        <div class='col-xs-12 col-sm-6'>",
          "<h2>Ajouter un match</h2>",
             $this->Form->create(),
             $date=$this->Form->control('J1',['type' => 'select',"label"=>"Joueur 1 : ","options"=>$ListMembre,'empty' => 'Choisissez','required' => true]),
             $date=$this->Form->control('J2',['type' => 'select',"label"=>"Joueur 2 : ","options"=>$ListMembre,'empty' => 'Choisissez','required' => true]),
             $date=$this->Form->control('date', ['type' => 'date','minYear'=>$actual_time->year,"label"=>"Date :",'required' => true  ]),
             $this->Form->control('heure', ['type' => 'time',"label"=>"Heure : ",'default'=>$actual_time->hour.":".$actual_time->minute,'required' => true]),
             $this->Form->control('duree', ['type' => 'number','min'=>0,'max'=>1439,'default'=>'60',"label"=>"Durée (en min) : ",'required' => true]),
             $this->Form->control('lieu', ['type' => 'text',"label"=>"Lieu : ",'required' => true]),
             $this->Form->submit("Créer nouveau match",array('name' => 'AddMatch')),
             $this->Form->end(),
         "</div>",
    "</div>";

?>

<?php if($classements!=null)
{
  echo "<h2>Classement</h2>

  <table class='table'>
    <tr>
      <th>Rang</th>
      <th>Joueur</th>
      <th>Points</th>
    </tr>";
    $rang=1;
    foreach($classements as $classement){
      //affichage
      echo "<tr>
        <td>".$rang."</td>
        <td>".$classement[0]."</td>
        <td>".$classement[1]."</td>
        <td>"."</td>";
      echo "</tr>";
      $rang++;
    }
}
if($classements!=null)echo "</table>"?>
