
<?php
echo "<h2>".$id_contest."</h2>";
echo "<div class='col-xs-12'>
        <div class='col-xs-12 col-sm-6'>",
          "<h2>Ajouter un match</h2>",
             $this->Form->create(),
             $date=$this->Form->control('J1',['type' => 'select',"label"=>"Joueur 1 : ","options"=>$ListMembre,'empty' => 'Choisissez','required' => true]),
             $date=$this->Form->control('J2',['type' => 'select',"label"=>"Joueur 2 : ","options"=>$ListMembre,'empty' => 'Choisissez','required' => true]),
             $date=$this->Form->control('date', ['type' => 'date','minYear'=>$actual_time->year,"label"=>"Date :",'required' => true  ]),
             $this->Form->control('heure', ['type' => 'time',"label"=>"Heure : ",'default'=>$actual_time->hour.":".$actual_time->minute,'required' => true]),
             $this->Form->control('duree', ['type' => 'number','min'=>0,'max'=>1439,'default'=>'60',"label"=>"Durée (en min) : ",'required' => true]),
             $this->Form->control('lieu', ['type' => 'text',"label"=>"Lieu : ",'required' => true]),
             $this->Form->submit("Créer nouveau match",array('name' => 'AddMatch')),
             $this->Form->end(),
        "</div>";
