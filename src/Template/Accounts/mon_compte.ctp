<section class="col-xs-4 col-xs-offset-4 titre">
  <h1 class='text-center'>Mon profil</h1>
</section>
<div class='col-xs-12'>
  <div class='col-xs-8 col-xs-offset-2 well'>
    <?php
    echo "<div class='col-xs-5 text-center'>";
      echo $this->Html->image($adressePhoto, array('alt' => 'photo de profil', 'height'=>'150', 'class'=>"photoProfil"));
    echo "</div>";
    echo "<div class='col-xs-7'>";
      foreach($membres as $member){
        echo "<h4 class='text-center'>Adresse mail : ".$member->email."</h4>";
      }
      echo $this->Form->create('FormPhoto', ['type' => 'file']),
      $this->Form->control("photo", ['type' => 'file','required'=>true, "label"=> false]),
      $this->Form->submit("Modifier photo de profil",array('name' => 'changePicture','class'=>"btn btn-info")),
      $this->Form->end();
    echo "</div>";



    ?>
  </div>
</div>
