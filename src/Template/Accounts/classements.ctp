<h1>Classements</h1>

<?php

foreach ($seances as $seance) {
    echo "<table class='table'>";
    echo "<tr>
        <th > Rang</th >
        <th > E - mail</th >
        <th > Date</th >
        <th > Performance </th >
        <th > Contests</th >
        <th ></th > ";
    echo "<h2>" . $seance->sport . "</h2>";

    foreach ($membres as $membre) {
        if ($seance->member_id == $membre->id) {
            foreach ($logs as $log) {
                if (($log->member_id == $membre->id) && ($seance->id == $log->workout_id)) {
                    echo " <tr><td > " . $log->id . "</td ><td > " . $membre->email . "</td ><td > " . $log->date . "</td><td>" . $log->log_type . " : " . $log->log_value . "</td><td>" . "X" . "</td></tr> ";
                }
            }
        }
    }
}
