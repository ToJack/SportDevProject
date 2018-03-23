<?php
  namespace App\Controller;

  use App\Controller\AppController;
  use Cake\Auth\DefaultPasswordHasher;

  class UsersController extends AppController
  {
    public function register()
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

        //blindage de l'email
        $check=$this->Members->find()->where(["email =" => $email_inscription])->toArray();
        if(count($check)>0){
        }
        //envoie à la bdd
        else {
          $newMember->email=$email_inscription;
          $hashedpassword= (new DefaultPasswordHasher)->hash($password_inscription);
          $newMember->password=$hashedpassword;
          $this->Members->save($newMember);
        return $this->redirect($this->here);
        }
      }

    }
    public function login()
    {
      $this->loadModel("Members");
      if($this->request->is('post')){
          $user = $this->Auth->identify();
          if($user){
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
            //return $this->redirect(['Controller'=>'Users','action'=>'index']);
          }
          else {
            $this->Flash->error(__('Invalid username or password, try again'));
          }
      }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('serialize', ['users']);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
  }
?>
