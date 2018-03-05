<?php

echo $this->Form->create();
echo $this->Form->input("email");
echo $this->Form->input("password");
echo $this->Form->submit("Valider");
echo $this->Form->end();

echo $this->Form->create();
echo $this->Form->input("Pseudo");
echo $this->Form->input("Name");
echo $this->Form->input("Family Name");
echo $this->Form->input("email");
echo $this->Form->input("confirm email");
echo $this->Form->input("password");
echo $this->Form->input("confirm password");
echo $this->Form->submit("Valider");
echo $this->Form->end();

?>
