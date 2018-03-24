<h1>Mes Objets Connectés</h1>

<?php if($check==null) echo "<h2>Aucun Objets Connectés sur votre compte</h2>"?>

<?php if($check!=null)echo "<h2>Vos Objets Connectés</h2>

<table class='table'>
  <tr>
    <th>Numéro de série</th>
    <th>Description</th>
    <th>Vérifié</th>
  </tr>";
  foreach($check as $objet){
    //affichage
    echo "<tr>
      <td>".$objet->serial."</td>
      <td>".$objet->description."</td>
      <td>".$objet->trusted."</td>";
    echo "</tr>";
  }

if($check!=null)echo "</table>"?>
