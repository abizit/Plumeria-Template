<?php
require_once('lessc.inc.php');

$inputFile = "layout.less";
$outputFile = "layout-compiled.css";

$less = new lessc;
$less->setFormatter("compressed");
$less->setPreserveComments(true);

// create a new cache object, and compile
$cache = $less->cachedCompile($inputFile);

file_put_contents($outputFile, $cache["compiled"]);

// the next time we run, write only if it has updated
$last_updated = $cache["updated"];
$cache = $less->cachedCompile($cache);
if ($cache["updated"] > $last_updated) {
    file_put_contents($outputFile, $cache["compiled"]);
}
header('Content-type: text/css');
echo file_get_contents($outputFile);

?>
