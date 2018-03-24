<h2></h2>
<section class="col-xs-4 col-xs-offset-4 titre">
  <h1 class='text-center'>Mon profil</h1>
</section>
<div class='col-xs-12'>

<?php


echo $this->Html->image($adressePhoto, array('alt' => 'photo de profil', 'height'=>'150px'));

echo $this->Form->create('FormPhoto', ['type' => 'file']),
$this->Form->control("photo", ['type' => 'file','required'=>true, "label"=> false]),
$this->Form->submit("Modifier photo de profil",array('name' => 'changePicture')),
$this->Form->end();

foreach($membres as $member){
  echo "<p>Adresse mail : ".$member->email."</p>";
}

?>
</div>
