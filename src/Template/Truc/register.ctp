<?php
echo $this->Form->create($new);
echo $this->Form->input("email");
echo $this->Form->input("password");
echo $this->Form->submit("creer");
echo $this->Form->end();
?>
