<h1>Hello Team</h1>



<?php
echo "<div class='col-xs-12'>
        <div class='col-xs-12 col-sm-6'>",
          "<h2>Se connecter</h2>",
           $this->Form->create(),
               $this->Form->input("email", ['type'=>'email', 'label' => 'Email : ']),
               $this->Form->input("password", ['type'=>'password', 'label' => 'Mot de passe : ']),
               $this->Form->submit("Se connecter", array('name' => 'LogIn')),
               $this->Form->end(),
        "</div>",
        "<div class='button' onclick='AfficherForm()'> <a>Inscription </a>","</div>",
        "<div id='FormReleve' class='col-xs-12 col-sm-6' style='display:none;'>
            <h2>S'inscrire</h2>",
            //"<div id='seanceReleve'></div>",
         $this->Form->create(),
                 $this->Form->input("email_inscription", ['type'=>'email', 'label' => 'Email : ']),
                 $this->Form->input("password_inscription", ['label' => 'Mot de passe : ']),
                 $this->Form->submit("S'inscrire", array('name' => 'AddMember')),
                 $this->Form->end(),
        "</div>",
    "</div>";
?>
