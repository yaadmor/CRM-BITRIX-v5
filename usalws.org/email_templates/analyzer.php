<?php
$folder = './content/';
$files = scandir($folder);
$result = array();

for($i = 2; $i < sizeof($files); $i++) {
  $file = $files[$i];
  $dom = new DOMDocument;
  $content = file_get_contents($folder . $file);
  //$content = str_replace("<br>", "<br/>", $content);
  echo $file."\n";
  $dom->load($content);
  $result[$file] = $dom->getElementsByTagName('img');
}
print_r($result);
 