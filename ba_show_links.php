<?php 
include 'b_connect.php';




?>
<html>
<head>
 Showing XML links for answers   
    <br>
</head>
<body>
    <pre>
  <?php 
    $sql="select * from q_bank order by q_date desc;";
    $result=$conn->query($sql);
    
    while($row=$result->fetch_assoc())
    {
    $qid=$row['qid'];
    $datetime=$row['q_date'];
    $dati=explode(' ',$datetime);
    $xml_link="<url>
<loc>https://www.doubtcool.com/qna/$qid.php</loc>
<lastmod>$dati[0]T$dati[1]+00:00</lastmod>
<priority>0.80</priority>
</url>";
    $xml_link=htmlspecialchars(addslashes($xml_link));
    echo $xml_link;
    ?> <br><?php 
    }
    
    
    ?>  
    </pre>
</body>



</html>