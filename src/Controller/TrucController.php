<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class TrucController extends AppController
    {
      public function machin()
      {
        //Afficher Members
        $this->loadModel("Members");
        $m=$this->Members->find();
        $this->set("m",$m->toArray());
      }
      function register(){
        $this->loadModel("Members");
        if($this->request->is("post"))//Request post ou non ?
        {
          $e=$this->request->data("email");
          $p=$this->request->data("password");
          $new=$this->Members->newEntity();
          $new->email=$e;
          $new->password=$p;
          $this->Members->save($new);
        }
        $this->set("new",$new);
      }
    }
