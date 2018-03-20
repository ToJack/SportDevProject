

<?php
echo $this->Form->create();
echo $this->Form->input("email_connexion", ['label' => 'Login : ']);
echo $this->Form->input("password_connexion", ['label' => 'Mot de passe : ']);
echo $this->Form->submit("Valider");
echo $this->Form->end();

echo $this->Form->create();
echo $this->Form->input("email_inscription", ['label' => 'Email : ']);
echo $this->Form->input("password_inscription", ['label' => 'Mot de passe : ']);
echo $this->Form->submit("Valider");
echo $this->Form->end();
?>
