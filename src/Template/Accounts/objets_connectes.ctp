<section class="col-xs-4 col-xs-offset-4 titre">
  <h1 class='text-center'>Mes Objets Connectés</h1>
</section>
<div class='col-xs-12'>
<?php
  if(count($check)>0){
    echo "<h2>Vos Objets Connectés</h2>
    <table class='table'>
      <tr>
        <th>Numéro de série</th>
        <th>Description</th>
        <th>Vérifié</th>
        <th></th>
        <th></th>
      </tr>";
      foreach($trustedDevices as $tDevices){
        $option=array('X'=>'Untrusted','O'=>'Trusted');
        $attributes=array('legend'=>false);
        //affichage
        if($tDevices->trusted==0){
          echo "<tr>
            <td>".$tDevices->serial."</td>
            <td>".$tDevices->description."</td>
            <td>".$this->Html->Link("Valider", ["controller"=>"Accounts", "action"=>"valider/".$tDevices->id])."</td>
            <td>".$this->Html->Link("Supprimer", ["controller"=>"Accounts", "action"=>"supprimer/".$tDevices->id])."</td></tr>";
        }
        else{
          echo "<tr>
            <td>".$tDevices->serial."</td>
            <td>".$tDevices->description."</td>
            <td><i class='glyphicon glyphicon-ok-sign'></i></td>
            <td>".$this->Html->Link("Supprimer", ["controller"=>"Accounts", "action"=>"supprimer/".$tDevices->id])."</td></tr>";
        }
      }
      echo "</table>";
      echo $this->Form->create('AddObjet',array('inputDefaults' => array('div' => 'form-group','wrapInput' => false,'class' => 'form-control'))),
        $this->Form->input("serial", ['label' => 'Serial : ', 'class'=>"form-control"]),
        $this->Form->input("description", ['label' => 'Description : ', 'class'=>"form-control"]),
        $this->Form->submit("Ajouter", array('name' => 'AddDevice', 'class'=>"btn btn-primary")),
        $this->Form->end();
  }
  else{
    echo "<h2>Aucuns Objets Connectés sur votre compte</h2>";
    echo $this->Form->create('AddObjet',array('inputDefaults' => array('div' => 'form-group','wrapInput' => false,'class' => 'form-control'))),
      $this->Form->input("serial", ['label' => 'Serial : ', 'class'=>"form-control"]),
      $this->Form->input("description", ['label' => 'Description : ', 'class'=>"form-control"]),
      $this->Form->submit("Ajouter", array('name' => 'AddDevice', 'class'=>"btn btn-primary")),
      $this->Form->end();
  }
?>
</div>
