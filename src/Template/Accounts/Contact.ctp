
<?php
echo $this->Form->create();
echo $this->Form->input("email", ['label' => 'Email :  ']);
echo $this->Form->input("comments", ['label' => 'Commentaire :']);
echo $this->Form->submit("Valider");
echo $this->Form->end();
?>
