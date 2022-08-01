<?php

//include 'b_connect.php';
 global $noimg;
do{
$t="img";
$y=date("y");
$m=date("m");
$d=date("d");
$r=rand();


$imgid=$t.$y.$m.$d.$r;


$_SESSION["a_img"]=$imgid;

$sql="select count(*) from user_info.a_bank where a_img='$imgid';";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$size=$row["count(*)"];

}while($size!=0);

global $img;
$img=$imgid;

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image



if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        $noimg=0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 20000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    $noimg=0;
}
// Allow certain file formats

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    $noimg=0;
}

if($_FILES["fileToUpload"]["size"]==0)
{
    $uploadOk=0;
    $noimg=0;
}
    
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
   
    $noimg=0;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$imgid.".".$imageFileType)) {
        
        $noimg=1;
        
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

global $img_type;

$img_type=$imageFileType;

?>