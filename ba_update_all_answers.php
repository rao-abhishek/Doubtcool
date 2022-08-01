<?php

include 'b_connect.php';

/*$newfile= "answers/q000001.php" ;
$fo= fopen($newfile,'w') or die(" Unable to open file");
$filestuff="   ";
fwrite($fo,$filestuff);
fclose($fo);
*/

$source = 'main_answer.php';

$sql="select * from q_bank;";

$result= $conn->query($sql);

while($row= $result->fetch_assoc())
{

$qid = $row['qid'];    

$destination = 'answers/'.$qid.'.php';

if(!copy($source,$destination))
{   
    echo $qid." Update failed (file cannot be copied) \n";
}
else {
    echo $qid." Update successfull (filecopied) \n";
}
}

?>