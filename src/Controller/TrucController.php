<?php
namespace App\Controller;

use App\Controller\AppController;

class TrucController extends AppController
{

    public function machin()
    {
      	$this->set("titi", "coucou Camille et Mickey");
        $this->loadModel("Members");
        $m=$this->Members->find();
        $this->set("m",$m->toArray());
    }
}
