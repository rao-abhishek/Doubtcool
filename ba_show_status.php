<?php 
include 'b_connect.php';




?>
<html>
<head>
 Showing status 
    <br>
</head>
<body>
  <?php 
    $sql="select count(q.qid),sum(q.q_visit),count(a.aid),count(u.uid),count(s.sqid) from q_bank q,a_bank a,all_info u,all_query s;";
    $result=$conn->query($sql);
    
    $row=$result->fetch_assoc();
    
    $qid=$row['qid'];
    $qc = $row['count(q.qid)'];
    $ac = $row['count(a.aid)'];
    $uc = $row['count(u.uid)'];
    $sc = $row['count(s.qid)'];
    $qvc = $row['sum(q.q_visit)'];
    
    echo "\n \tSTATUS";
    echo "\n Number of Users registered -> $uc";
    echo "\n Number of Questions Uploaded -> $qc";
    echo "\n Number of Answers Uploaded -> $ac";
    echo "\n Number of Searches -> $sc ";
    echo "\n Number of Question visit -> $qvc";
    ?> <br><?php 
    
    
    
    ?>  
    
</body>



</html>