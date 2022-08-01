<!doctype HTML>
<html>
<head>
<title>Establish rank</title>
    
    <?php 
    include 'b_connect.php';
    session_start();
    $_SESSION['admin_access']=0;
    
    ?>
    
</head>
<body>

    <h1>Doubtcool Admin setup page</h1>
    <h2> Establish rank from none</h2>
    <form method="post">
    <label>Admin Username :<input required type="text" name="admin_username"></label>
    <br>
    <br>
    <label>Password :<input required type=password name="admin_password"></label>
    <br>
    <br>
    <br>
    <button style="margin-left:100px;" type="submit" >LOGIN</button>
    </form>
    
    <?php 


if(isset($_POST['admin_username']) && isset($_POST['admin_password']))
{
$admin_username=$_POST['admin_username'];
$admin_password=$_POST['admin_password'];


$sql="select * from user_info.admin_member where admin_email='$admin_username' and admin_password='$admin_password' ;";

   
    



    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    
    if($row['admin_name']!=NULL)
    {
    echo "welcome ".$row['admin_name']." ";
    
    $_SESSION['admin_access']=1;
    }
    
    else
{
    
    echo "incorrect creditials";
 
}
   

}



    


?>

    <div class="rank_controls">
    <?php
      if($_SESSION['admin_access']==1)  {?>
    
        <form action="method"><label>SET UP SCORE / UPDATE SCORE : </label><button type="submit" name="rank" value="rank" >RANK- CLick here</button>
        
        <?php
        if($_POST['rank']='rank')
        {
           $sql= "select * from user_info.all_info ;";
            
            $result=$conn->query($sql);
            
           while($row=$result->fetch_assoc())
           {
               $email=$row['email'];
               $ssql="select count(*),query_text from all_query where query_uploader='$email' ;";
               $qsql="select count(*),q_text from q_bank where q_uploader='$email';";
               $asql="select count(*),a_text from a_bank where a_uploader='$email' ;";
               
               $s_result=$conn->query($ssql);
               $q_result=$conn->query($qsql);
               $a_result=$conn->query($asql);
               
               $s_row=$s_result->fetch_assoc();
               $a_row=$a_result->fetch_assoc();  
               $q_row=$q_result->fetch_assoc();
               
               $s_count=$s_row['count(*)'];
               $s_text=$s_row['query_text'];
               $s_text_c=str_word_count($s_text);
               
               $a_count=$a_row['count(*)'];
               $a_text=$a_row['a_text'];
               $a_text_c=str_word_count($a_text);
               
               $q_text=$q_row['q_text'];
               $q_count=$q_row['count(*)'];
               $q_text_c=str_word_count($q_text);
               
               $total=$s_count+ $q_count + $a_count + $q_text_c + $a_text_c + $s_text_c;
               
              $usql="UPDATE `user_info`.`all_info` SET `score` = '$total' WHERE (`email` = '$email');";
               $uresult=$conn->query($usql);
               
               //$sql = "update 'user_info'.'all_info' set 'score' = '$total' where ('email' = '$email');";
               
           }
            
        }
        
        
        
        
        ?>
        
        <br>
        <br>
        <br>
        <br>
        <label>ADD NEW ADMIN MEMBER : </label><button>NEW ADMIN MEMBER - CLick here</button></form>
             
        <br>
        <br>
        <br>
        <br>
        <label> Goto Server </label><a href="https://sh002.bigrock.com:2083/cpsess0974492593/frontend/paper_lantern/index.html"><button>GOTO SERVER - CLick here</button></a>
        <br>
         <label>Update all Answers</label><a href="ba_update_all_answers.php"><button>Update all Answers - CLick here</button></a>
        
        <br>
        <br>
         <br>
         <label>Show STATUS </label><a href="NULL"><button>Show STATUS - CLick here</button></a>
        <?php } ?>
    
    </div>
   
    
    
</body>
</html>


