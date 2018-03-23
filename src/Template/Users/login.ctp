<h1>Hello Team</h1>

<?php
echo $this->Form->create(),
     $this->Form->input("email", ['type'=>'email', 'label' => 'Email : ']),
     $this->Form->input("password", ['type'=>'password', 'label' => 'Mot de passe : ']),
     $this->Form->submit("Se connecter", array('name' => 'LogIn')),
     $this->Form->end();
?>
