<section class="col-xs-4 col-xs-offset-4 titre">
  <h1 class='text-center'>Classements</h1>
</section>
<div class='col-xs-12'>
<?php
$i=0;
if($sport==null)echo "Aucun match de tournoi n'a eu lieu";
else{
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
    }
    $i++;
  }
}

echo "</table>";
?>
</div>
