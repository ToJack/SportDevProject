<section class="col-xs-4 col-xs-offset-4 titre">
  <h1 class='text-center'>Classements</h1>
</section>
<div class='col-xs-12'>
<?php
$i=0;
$vide=1;
while($i<18)
{
  if($sport[$i]!=null)
  {
    echo "
    <h2>".$listSport[$i]."</h2>
    <table class='table'>
      <thead>
        <tr>
          <th>Rang</th>
          <th>Joueur</th>
          <th>Points</th>
        </tr>
      </thead>";
    $rang=1;
    foreach($sport[$i] as $membre){
      //affichage
      echo "<tr>
        <td>".$rang."</td>
        <td>".$membre[0]."</td>
        <td>".$membre[1]."</td>";
      echo "</tr>";
      $rang++;
    }
    $vide=0;
  }
  $i++;
}
echo "</table>";
if($vide==1)echo "<h2 class='text-center'>Aucun match de compétition n'a eu lieu</h2>";
?>
</div>
