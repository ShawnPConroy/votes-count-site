<ul>
<?php

// Does not work for elections question data because it doesn't have the info bit.
foreach($elections as $key=>$info) {
    echo "<li><a href=\"/vote/{$key}\">{$info['Info']['Name']}</a></li>";
}

?>
</ul>