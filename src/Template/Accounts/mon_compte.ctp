<h2>Mon profil</h2>

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
