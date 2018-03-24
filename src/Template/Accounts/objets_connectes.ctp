<h1>Mes Objets Connectés</h1>

<?php
  if($check!=0){
    echo "<h2>Vos Objets Connectés</h2>
    <table class='table'>
      <tr>
        <th>Numéro de série</th>
        <th>Description</th>
        <th>Vérifier</th>
        <th>Ajouter</th>
        <th>Supprimer</th>
      </tr>";
      foreach($trustedDevices as $tDevices){
        //affichage
        if($tDevices->trusted==0){
          echo "<tr>
            <td>".$tDevices->serial."</td>
            <td>".$tDevices->description."</td>
            <td>"."non"."</td>";
          echo "</tr>";
        }
        else{
          echo "<tr>
            <td>".$tDevices->serial."</td>
            <td>".$tDevices->description."</td>
            <td>"."oui"."</td>";
          echo "</tr>";
        }
      }
  }
  else{
    echo "<h2>Aucuns Objets Connectés sur votre compte</h2>";
  }
?>
