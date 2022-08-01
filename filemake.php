<?php 

/*function insert_into_file($file_path, $insert_marker, $text, $after = true) {
	$contents = file_get_contents($file_path);
	$new_contents = preg_replace($insert_marker, 
			($after) ? '$0' . $text : $text . '$0', $contents);
	return file_put_contents($file_path, $new_contents);
}*/

copy("test_sitemap.xml","temp.txt");
$newfile= "temp.txt" ;
$fw= fopen($newfile,'w+') or die(" Unable to open file");

$text= " <url>
  <loc>https://www.doubtcool.com/qna/?C=D;O=A</loc>
  <lastmod>boomtesting</lastmod>
  <priority>0.80</priority>
</url> ";

fseek($fw,300);

if ($num_bytes === false) {
	echo "Could not insert into file $file_path.";
} else {
	echo "Insert successful!";
}

fwrite($fw,$text);
copy("temp.txt","test_sitemap.xml");

fclose($fw);
?>