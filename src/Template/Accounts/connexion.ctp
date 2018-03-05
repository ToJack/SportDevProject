<?php

echo $this->Form->create();
echo $this->Form->input("email");
echo $this->Form->input("password");
echo $this->Form->submit("Valider");
echo $this->Form->end();

?>
