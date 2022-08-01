<?php

$filename='xmltest.xml';

$text = "
<url>
<loc>https://www.doubtcool.com/qna/zofddfsdsdfoom.php</loc>
<lastmod>2020-11-16T13:21:31+00:00</lastmod>
<priority>0.80</priority>
</url> 
";

  $file = fopen($filename, "c");
  fseek($file, 385);
  fwrite($file, $text);
  fclose($file);
?>