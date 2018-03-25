<?php

namespace App\Model\Table;
use Cake\ORM\Table;

class DevicesTable extends Table {

  public function validate($objetId){
    $objetChange=$this->get($objetId);
    $objetChange->trusted=1;
    return $this->save($objetChange);
  }

  public function deleteObjet($objetId){
    $objetChange=$this->get($objetId);
    return $this->delete($objetChange);
  }
}
?>
