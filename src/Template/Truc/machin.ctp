<?php $this->assign("title","nouveau titre");?>

<?= $this -> Html -> link("click me", ["controller"=>"Truc","action"=>"machin"]);?>

<!--<?php pr($m);?>-->

<table>
  <?php foreach($m as $user){
    echo "<td>".$user->email."</td><td>".$user->password."</td>";
  }
  ?>
</table>
