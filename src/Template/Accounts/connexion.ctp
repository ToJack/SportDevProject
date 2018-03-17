
<?php

echo $this->Form->create();
echo $this->Form->input("email");
echo $this->Form->input("password");
echo $this->Form->submit("Valider");
echo $this->Form->end();

echo $this->Form->create();
echo $this->Form->input("imail", ['label' => 'Email']);
echo $this->Form->input("confirmE", ['label' => 'Confirm Email']);
echo $this->Form->input("pswd", ['label' => 'Password']);
echo $this->Form->input("confirmP", ['label' => 'Confirm Password']);
echo $this->Form->submit("Valider");
echo $this->Form->end();

?>
