



<?php



function hitback_sql($sql,$conn)
{
    $result=$conn->query($sql);
}

function getback_sql($sql)
{
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    
    return $row; 
}



?>