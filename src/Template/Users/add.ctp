
<?php
echo $this->Form->create(),
     $this->Form->input("email_inscription", ['type'=>'email', 'label' => 'Email : ']),
     $this->Form->input("password_inscription", ['label' => 'Mot de passe : ']),
     $this->Form->submit("S'inscrire", array('name' => 'AddMember')),
     $this->Form->end();
?>
