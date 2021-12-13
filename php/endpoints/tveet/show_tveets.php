<?php 

$handler = new Tveet();
$tveet = $handler->getActualTveets();


while ($row = pg_fetch_row($result)) {
    echo "Text: $row[0] <br />";
    echo "Author: $row[1] Date: $row[2]"
    echo "<br /> <br />\n";
}
