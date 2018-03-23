<h1>La page register se trouve à l'address suivante http://localhost:8888/SportDevProject/users/register</h1>


echo $this->Form->create(),
     $this->Form->input("email_inscription", ['type'=>'email', 'label' => 'Email : ']),
     $this->Form->input("password_inscription", ['label' => 'Mot de passe : ']),
     $this->Form->submit("S'inscrire", array('name' => 'AddMember')),
     $this->Form->end();

echo $this->Form->create();
echo $this->Form->input("email_connexion", ['label' => 'Login : ']);
echo $this->Form->input("password_connexion", ['label' => 'Mot de passe : ']);
echo $this->Form->submit("Valider");
echo $this->Form->end();
