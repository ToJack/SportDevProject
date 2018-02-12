<?php $this->assign("title","nouveau titre"); ?>

<?= $this -> Html -> link("click me", ["controller"=>"Accounts","action"=>"accueil"]);?>


<!--<?php pr($m);?>-->

<table>
  <?php
  foreach($m as $user){
    echo "<tr><td>".$user->email."</td><td>".$user->password."</td><tr>";
  }
  ?>
</table>
<?php
echo $this->Form->create($m);
echo $this->Form->input("email");
echo $this->Form->input("password");
echo $this->Form->submit("creer");
echo $this->Form->end();
?>
