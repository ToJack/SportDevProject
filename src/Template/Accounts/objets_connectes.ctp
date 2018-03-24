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
      </tr>",
      $this->Form->create();
      foreach($trustedDevices as $tDevices){
        $option=array('X'=>'Untrusted','O'=>'Trusted');
        $attributes=array('legend'=>false);
        //affichage
        if($tDevices->trusted==0){
          echo "<tr>
            <td>".$tDevices->serial."</td>
            <td>".$tDevices->description."</td>
            <td>"."non"."</td>";
          echo "<td>".$this->Form->radio('trusted', $option, $attributes)."</td></tr>";
        }
        else{
          echo "<tr>
            <td>".$tDevices->serial."</td>
            <td>".$tDevices->description."</td>
            <td>"."oui"."</td>
            <td>".
            $this->Form->radio('trusted', $option, $attributes)."</td></tr>";
        }
      }
      echo $this->Form->submit("Valider les modifications",array('name'=> 'ModTrust')),
           $this->Form->end();
      echo "</table>";
  }
  else{
    echo "<h2>Aucuns Objets Connectés sur votre compte</h2>";
  }
?>
