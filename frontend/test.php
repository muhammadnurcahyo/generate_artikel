<?php

$text = array('Copyright A', 'Copyright B', 'Copyright C', 'Copyright D');
$rand = rand(0, count($text));
$content = '<p>Paragraph1</p>';
$target = '<p>';
$ptags = explode($target, $content);
$new_content = array_shift($ptags);

foreach ($ptags as $i => $p) {
    $new_content .= $text[$i % $rand] . $target . $p;
}
var_export($new_content);


?>