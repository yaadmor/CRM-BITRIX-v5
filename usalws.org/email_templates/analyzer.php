<?php
$folder = './content/';
$files = scandir($folder);
$img_file = array();
$file_img = array();

for($fileIndex = 2; $fileIndex < sizeof($files); $fileIndex++) {
  $filename = $files[$fileIndex];
  $dom = new DOMDocument;
  $dom->loadHTMLFile($folder . $filename);
  foreach($dom->getElementsByTagName('img') as $img) {
    $attrs = $img->attributes; 
    for($atIndex = 0; $atIndex < $attrs->length; $atIndex++) {
      $attr = $attrs->item($atIndex);
      if ($attr->name == 'src') {
        $src = $attr->value;
        if (!array_key_exists($src, $img_file))
          $img_file[$src] = array();
        if (!array_key_exists($filename, $img_file[$src]))
          $img_file[$src][$filename] = true;

        if (!array_key_exists($filename, $file_img))
          $file_img[$filename] = array();
        if (!array_key_exists($src, $file_img[$filename]))
          $file_img[$filename][$src] = true;
      }
    }
  }
}

foreach($img_file as $img => $file) {
  $val = array_keys($file);
  $img_file[$img] = sizeof($val) == 1 ? $val[0] : $val;
}
foreach($file_img as $file => $img) {
  $val = array_keys($img);
  $file_img[$file] = sizeof($val) == 1 ? $val[0] : $val;
}

mkdir('output');
file_put_contents('./output/img_file.json', 
  json_encode($img_file, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
);
file_put_contents('./output/file_img.json', 
  json_encode($file_img, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
);
 