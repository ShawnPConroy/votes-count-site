<table>
    <thead>
        <th>Name</th>
    </thead>
<?php

foreach($candidates as $cur) {
    echo "<tr>";
    foreach($cur as $datum) {
        echo "<td>{$datum}</td>";
    }
    echo "</tr>";
}


?>
</table>