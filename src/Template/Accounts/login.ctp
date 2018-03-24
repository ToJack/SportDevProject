<section class="col-xs-4 col-xs-offset-4 titre">
  <h1 id='titreConnexion' class='text-center'>Connexion</h1>
</section>
<div class='col-xs-12'>

  <?php
  echo "<div class='col-xs-12'>
          <div id='connexion' class='col-xs-12 col-sm-6 col-sm-offset-3 well'>",
             $this->Form->create('connexion',array('inputDefaults' => array('div' => 'form-group','wrapInput' => false,'class' => 'form-control'))),
                 $this->Form->input("email", ['type'=>'email', 'label' => 'Email : ', 'class'=>"form-control"]),
                 $this->Form->input("password", ['type'=>'password', 'label' => 'Mot de passe : ', 'class'=>"form-control"]),
                 $this->Form->submit("Se connecter", array('name' => 'LogIn', 'class'=>"btn btn-primary")),
             $this->Form->end(),
             "<div class='text-right'><a id='boutonSwap' class='text-right' onclick='SwapInscriptionConnexion()'>S'inscrire</a></div> ",
          "</div>",
          "<div id='inscription' class='col-xs-12 col-sm-6 col-sm-offset-3 well' style='display:none;'>",
               $this->Form->create('inscription',array('inputDefaults' => array('div' => 'form-group','wrapInput' => false,'class' => 'form-control'))),
                   $this->Form->input("email_inscription", ['type'=>'email', 'label' => 'Email : ', 'class'=>"form-control"]),
                   $this->Form->input("password_inscription", ['label' => 'Mot de passe : ', 'class'=>"form-control"]),
                   $this->Form->submit("S'inscrire", array('name' => 'AddMember', 'class'=>"btn btn-primary")),
           $this->Form->end(),
           "<div class='text-right'><a id='boutonSwap' onclick='SwapInscriptionConnexion()'>Revenir à la Connexion</a> </div>",
          "</div>",
      "</div>";
  ?>
</div>
