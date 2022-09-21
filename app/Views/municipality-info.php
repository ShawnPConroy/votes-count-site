<nav>
<ul>
    <li><a href="#A">A</a></li>
    <li><a href="#B">B</a></li>
    <li><a href="#C">C</a></li>
    <li><a href="#D">D</a></li>
    <li><a href="#E">E</a></li>
    <li><a href="#F">F</a></li>
    <li><a href="#G">G</a></li>
    <li><a href="#H">H</a></li>
    <li><a href="#I">I</a></li>
    <li><a href="#J">J</a></li>
    <li><a href="#K">K</a></li>
    <li><a href="#L">L</a></li>
    <li><a href="#M">M</a></li>
    <li><a href="#N">N</a></li>
    <li><a href="#O">O</a></li>
    <li><a href="#P">P</a></li>
    <li><a href="#Q">Q</a></li>
    <li><a href="#R">R</a></li>
    <li><a href="#S">S</a></li>
    <li><a href="#T">T</a></li>
    <li><a href="#U">U</a></li>
    <li><a href="#V">V</a></li>
    <li><a href="#W">W</a></li>
    <li><a href="#X">X</a></li>
    <li><a href="#Y">Y</a></li>
    <li><a href="#Z">Z</a></li>
</ul></nav>

<?php

$letter = 'A';
echo "<details style=\"display: inline-block\"><summary><h3 id=\"{$letter}\">$letter</h3></summary><ul style=\"column-count:3;\">";

foreach($municipalities as $mun) {
    // Default to using the first candidate in municipality group
    if ($mun[0]['MUNICIPALITY NAME'][0] != $letter) {
        $letter = $mun[0]['MUNICIPALITY NAME'][0];
        echo "</ul></details>\n<details style=\"display: inline-block\"><summary><h3 id=\"{$letter}\">$letter</h3></summary><ul style=\"column-count:3;\">";
    }
    $url = urlencode($mun[0]['MUNICIPALITY NAME']);
    echo "  <li><a href=\"/{$url}\">{$mun[0]['MUNICIPALITY NAME']}</a></li>\n";
}
?>

</ul>
</details>