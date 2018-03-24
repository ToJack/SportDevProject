<h1>Classements</h1>

<?php
$i=0;
while($i<18)
{
  if($sport[$i]!=null)
  {
    echo "
    <h2>".$listSport[$i]."</h2>
    <table class='table'>
      <tr>
        <th>Rang</th>
        <th>Joueur</th>
        <th>Points</th>
      </tr>";
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

echo "</table>";
