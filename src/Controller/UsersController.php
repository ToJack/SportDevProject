<?php
  namespace App\Controller;

  use App\Controller\AppController;

  class UsersController extends AppController
  {
    public function connexion()
    {
      $this->loadModel("Members");
      $members=$this->Members->find();

      //Formulaire nouveau membre
      $newMember=$this->Members->newEntity();
      if(isset($this->request->data["AddMember"]))
      {
        //attribution des valeurs
        $email_inscription=$this->request->data("email_inscription");
        $password_inscription=$this->request->data("password_inscription");

        //envoie à la bdd
        $newMember->email=$email_inscription;
        $newMember->password=$password_inscription;
        $this->Members->save($newMember);
      return $this->redirect($this->here);
      }

    }
    public function login()
    {

    }
  }
?>
