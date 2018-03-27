<section class="col-xs-4 col-xs-offset-4 titre">
  <h1 class='text-center'>Les compétitions</h1>
</section>
<div class='col-xs-12'>

<!--Premier tableau-->
<?php if($contests!=null)
{
  echo "
    <div class='col-xs-12'>
      <table class='table'>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Sport</th>
            <th>Description</th>
          </tr>
        </thead>";

        foreach($contests as $contest){
          //affichage
          echo "<tr>
            <td>".$this->Html->link($contest->name,['controller' => 'Accounts','action' => 'singleCompetition/'.$contest->id])."</td>
            <td>".$contest->type."</td>
            <td>".$contest->description."</td>
          </tr>
          <tr style='display:none;'>
            <td></td><td></td><td></td>
          </tr>
          ";
        }
  echo "</table></div>";

  echo "<div class='col-xs-6' style='display:none;'>
          <table class='table'>
            <tr>
              <th>Nom</th>
              <th>Sport</th>
              <th>Plus d'infos</th>
            </tr>";


    echo  "</table>
        </div>";
}
else {
  echo "<h2>Aucune compétition</h2>";
}
?>
<!--Formulaires-->

<?php
echo "<div class='col-xs-6 col-xs-offset-3 well'>",
          "<h2>Ajouter une compétition</h2>",
             $this->Form->create(),
             $date=$this->Form->control('name', ['type' => 'text',"label"=>"Nom :",'required' => true , 'class'=>"form-control" ]),
             $this->Form->control('sport', ['type' => 'select'  ,"options"=>$listSport,'empty' => 'Choisissez',"label"=>"Sport : ",'required' => true, 'class'=>"form-control"] ),
             $this->Form->control('description', ['type' => 'textarea',"label"=>"Description : ", 'required'=> true, 'class'=>"form-control"]),
             $this->Form->submit("Ajouter compétition",array('name' => 'AddContest','class'=>"btn btn-primary")),
             $this->Form->end(),
        "</div>";

?>
</div>
