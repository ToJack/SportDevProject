<h1>Mes Objets Connectés</h1>

<?php
  $memberId=$this->Auth->user('id');
  $check=$this->Devices->find()->where(["member_id =" => $memberId])->toArray();
  if(count($check)>0){
    echo "<h2>Vos Objets Connectés</h2>

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
    //$deviceSerial=$this->Devices->find()->where(["serial"]);
  }
  else{
    echo "<h2>Aucuns Objets Connectés sur votre compte</h2>";
  }
?>
