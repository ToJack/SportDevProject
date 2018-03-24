<h1>Classements</h1>
<?php
$sport = "";
foreach ($allArrays as $a) {
    if ($a != null) {
        $id = 1;
        echo "<table class='table'>
        <tr>
          <th>Rang</th>
          <th>User</th>
          <th>Performance</th>
        </tr>";
        for ($i = 0; $i < sizeof($a); $i++) {
            if ($sport != $a[$i][1]) {
                echo "
    <h2>" . $a[$i][1] . "</h2>";
                $sport = $a[$i][1];
            }
            echo " <tr><td > " . $id . "</td ><td > " . $a[$i][0] . "</td><td>" . $a[$i][2] . "</td></tr> ";
            $id = $id + 1;
        }
        echo "</table>";
    }
}


