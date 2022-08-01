 <?php

session_start();
//$_SESSION['message']='';
//$_SESSION['error']=0;

$_SESSION['cur_file']=basename($_SERVER['PHP_SELF']);

include 'b_connect.php';
//include 'crawler.php';

if(isset($_SESSION['crawler'])!=1)
{
    header('location:crawler.php');
}

if(isset($_SESSION['sess_fix'])!=1)
{
    include 'b_fix_sessions.php';
    
}



if(!isset($_SESSION['logged_in']))
{
    $_SESSION['sign_up']=true;
    header('location:explore.php');
    
}





/*if($fil_done!=1){
$_SESSION['exam']="all";
$_SESSION['subject']="all";
$_SESSION['topic']="all";
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <link rel = "icon" href="icon.png" type="image/x-icon">
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="w3.css">
    <!--<link rel="stylesheet" type="text/css" href="d_explore.css">-->
    <link rel="stylesheet" type="text/css" href="d_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile | Doubtcool</title>
    
  
  <link rel="stylesheet" href="d_jquery_ui.css">
  <link rel="stylesheet" href="d_ui_custom.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"> </script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"> </script>
    
    
    <script>
  $( function() {
    var availableTags = <?php echo $_SESSION['all_query']?>; 
    $( "#search_bar" ).autocomplete({
      source: function(request, response) {
        var results = $.ui.autocomplete.filter(availableTags, request.term);
        
        response(results.slice(0, 10));
      }
    });
  } );
  </script>
    
</head>
    
<body>
<div class="top_search_bar">
    <p1 title="Doubtcool">Doubtcool</p1>
        <div class="ui-widget">
  <form action="crawler.php" method="get">
        
     <input id="search_bar" type="text" required name="s" placeholder=" &#8981;   What's your Question ?"/>
    </form>
</div>
    </div>
    
    <div class="contribution">
        
        <?php 
   $email = $_SESSION['email']   ; 
    
       $sql=" SELECT count(*) FROM user_info.q_bank where q_uploader='$email';";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        
        $_SESSION['q_count']=$row['count(*)'];
        
         $sql=" SELECT count(*) FROM user_info.a_bank where a_uploader='$email';";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        
        $_SESSION['a_count']=$row['count(*)'];
        
         $sql=" SELECT count(*) FROM user_info.a_bank where a_uploader='$email' and a_certify=1;";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        
        $_SESSION['ac_count']=$row['count(*)'];
        
         
        $table_name="table".$_SESSION['email']."followers";
         $sql=" SELECT count(*) FROM user_info.`$table_name`;";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        
        $_SESSION['fr_count']=$row['count(*)'];
        
        
        $table_name="table".$_SESSION['email']."following";
         $sql=" SELECT count(*) FROM user_info.`$table_name` ;";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        
        $_SESSION['fw_count']=$row['count(*)'];
        
        
        ?>
        
    <div class="follwers">
      <div class="count">
        
        <?php echo $_SESSION['fr_count']; ?>
      </div> 
      <div class="c_title">
        
      Followers
      </div>
        
    </div>
    <div class="follwing">
         <div class="count">
        
         <?php echo $_SESSION['fw_count']; ?>
      </div> 
      <div class="c_title">
        following
      
      </div>
        
    </div>
    
    <div class="user_name">
        
        <img id="bio_pic" src="bio_pic.png" width=100px height=110px alt="bio_pic">
        
        <p style="text-align: center"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></p>
     
    </div>
        <div id="top_border_line"></div>
    
    <div class="questions">
         <div class="count">
        <?php echo $_SESSION['q_count'];
             ?>
        
      </div> 
      <div class="c_title">
        Question
      
      </div>
    
        
    </div>
    <div class="answers">
         <div class="count">
         <?php echo $_SESSION['a_count'];
             ?>
        
      </div> 
      <div class="c_title">
        Answers
      
      </div>
    
    </div>  
        <?php  if($_SESSION['ac_count']>0)
{
        ?>
    <div class="certified_answer">
         <div class="count">
        1
        
      </div> 
      <div class="c_title">
        
      Certified Answer
      </div>
        
        
        
    </div>
        
    <?php } ?>
         
    
    </div>
    <div class="data_col">
    
        
    <?php 
    global $data_set;
    /*  $sql="select * from user_info.q_bank;";
    $result=$conn->query($sql);
    
    while($row=$result->fetch_assoc())
    { $sample=$row['q_date_text'];
  
    $sam=str_replace("\n","<br>",$sample);
    echo $sam."<br>";
    
    }  */
    
    include 'get_qna_data.php';
        
    
        
    if(!isset($_SESSION['new_filter'])) {
        
        
    
       //$_SESSION['new_filter']="select * from user_info.q_bank order by q_visit desc;";
        
    }   
      $setsql=$_SESSION['new_filter'];
        
        $email=$_SESSION['email'];

      $setsql="select * from user_info.q_bank where q_uploader='$email' order by q_date desc  ;";
     
    setsql($setsql);
      global  $i,$vqid;
      $i=0;
        jump:
       $data_set = getdata($conn);
       $i++;
       
       $vqid =  $data_set[$i][9];
    
    
    
    ?>
    
   
    <div class="qna_box">
    
        
           
            <p2 class="qna_name"><?php echo $data_set[$i][0]." ".$data_set[$i][1]; ?></p2>
             <p2 class="q_date">uploaded on <?php echo $data_set[$i][2]; ?></p2>
            <p2 class="q_subject"><?php echo $data_set[$i][5]." | ".$data_set[$i][3]." | ".$data_set[$i][4]; ?></p2>
       <div class="border_line"></div>
      
        <div class="qna_body">
    <?php
        echo $data_set[$i][6];   ?>
        </div>
        <div class="ans_count">
             <?php
        $count = "select count(*) from user_info.a_bank where a_qid='$vqid' and a_certify='0';";
       $result=$conn->query($count);
        $row=$result->fetch_assoc();
        global $uc_count;
        
        $uc_count=$row['count(*)'];
        
        global $c_count;
        $count = "select count(*) from user_info.a_bank where a_qid='$vqid' and a_certify='1';";
       $result=$conn->query($count);
        $row=$result->fetch_assoc();
        $c_count=$row['count(*)'];
        ?>
            
        <?php echo $c_count+$uc_count; ?> answers available
            
        </div>
    <div id="border_line"></div>
        
        <div class="rating_box">
     
      <?php 
            
         
            
           
            
          
                
                $email=$_SESSION['email'];
                $r_sql="select avg(u_popularity), avg(u_lengthy), avg(u_thinking), avg(u_memory_based) from user_info.user_qna_rating where qid='$vqid';";
                $result=$conn->query($r_sql);
                $row= $result->fetch_assoc();
                
                if($result==true)
                {
                    
                 $a_popularity = $row['avg(u_popularity)'] ;
                 $a_thinking = $row['avg(u_thinking)'] ;
                 $a_lengthy = $row['avg(u_lengthy)'] ;
                 $a_memory_based = $row['avg(u_memory_based)'] ;
                    
                         
                 $a_popularity = (int)$a_popularity ;
                 $a_thinking = (int)$a_thinking ;
                 $a_lengthy = (int)$a_lengthy ;
                 $a_memory_based = (int)$a_memory_based ;
                    
                }
                
            
                
                
            
            
            ?>
     
        <p id="rate_type">
            Popularity
              <?php  $uncheck = 5 - $a_popularity;
             for($ir=0;$ir<$a_popularity;$ir++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($ir=0;$ir<$uncheck;$ir++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?>
        </p>
        
        <p id="rate_type">Thinking
            <?php  $uncheck = 5 - $a_thinking;
             for($ir=0;$ir<$a_thinking;$ir++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($ir=0;$ir<$uncheck;$ir++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?>
            </p>
            <p id="rate_type">Lengthy <?php  $uncheck = 5 - $a_lengthy;
             for($ir=0;$ir<$a_lengthy;$ir++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($ir=0;$ir<$uncheck;$ir++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?> 
            </p>
            <p id="rate_type">Memory based 
                
                <?php  $uncheck = 5 - $a_memory_based;
             for($ir=0;$ir<$a_memory_based;$ir++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($ir=0;$ir<$uncheck;$ir++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?>
            </p>
            
    
            
          
            
        </div>
        
        
     
        
           <br>
      <br>
      <br>
      <br>
  <div class="ans_click">

      <a href="answers.php?qid=<?php echo $data_set[$i][9]; ?>#submit" target="_blank"><button id="give">Give answer</button></a>
      <a href="answers.php?qid=<?php echo $data_set[$i][9]; ?>" target="_blank"><button id="show">Show answers</button></a>
      
      
        
  </div>
       

        
         
    </div>
      
        <?php 
        if($i<$_SESSION['qna_count']-1)
        goto jump;
        
        
        // try some other algorithm , your website cannot rely on this algorithm....
        //bettr luck next time....
        ?>
    </div>
    <div class="ans_data_col">
   
        <?php
        
        
         global $data_set;
        
         include 'get_profile_data.php';
        
    
        
    if(!isset($_SESSION['new_filter'])) {
        
        
    
       //$_SESSION['new_filter']="select * from user_info.q_bank order by q_visit desc;";
        
    }   
      $setsql=$_SESSION['new_filter'];
        
        $email=$_SESSION['email'];
        
      $setsql="select * from user_info.a_bank where a_uploader='$email' order by a_date desc  ;";
     
    p_setsql($setsql);
      global  $i,$vqid;
      $i=0;
        a_jump:
       $data_set = p_getdata($conn);
       $i++;
       
       $vqid =  $data_set[$i][7];
    
    
    
    ?>
    
    
    <div class="qna_box">
        <p2 class="qna_name"><?php echo $data_set[$i][0]." ".$data_set[$i][1]; ?></p2>
        <p2 class="q_date">uploaded on <?php echo $data_set[$i][2]; ?></p2>
        <p2 class="q_subject"><?php echo $data_set[$i][5]." | ".$data_set[$i][3]." | ".$data_set[$i][4]; ?></p2>
        <div class="border_line"></div>
        <div class="qna_body" style="color:#72717A;"><?php echo $data_set[$i][13]; ?></div>
        <div id="border_line"></div>
        <div class="qna_body" style="font-size:18px;"><?php echo $data_set[$i][6]; ?></div>
        <div id="border_line"></div>
        <?php if($data_set[$i][10]==1)
{?>
        <div class="certify_tag">Certified</div>
        <?php }  ?>
        <div class="rating_box">
     
      <?php 
            
         
            
           
            
          
                
                $email=$_SESSION['email'];
                $r_sql="select avg(u_popularity), avg(u_lengthy), avg(u_thinking), avg(u_memory_based) from user_info.user_qna_rating where qid='$vqid';";
                $result=$conn->query($r_sql);
                $row= $result->fetch_assoc();
                
                if($result==true)
                {
                    
                 $a_popularity = $row['avg(u_popularity)'] ;
                 $a_thinking = $row['avg(u_thinking)'] ;
                 $a_lengthy = $row['avg(u_lengthy)'] ;
                 $a_memory_based = $row['avg(u_memory_based)'] ;
                    
                         
                 $a_popularity = (int)$a_popularity ;
                 $a_thinking = (int)$a_thinking ;
                 $a_lengthy = (int)$a_lengthy ;
                 $a_memory_based = (int)$a_memory_based ;
                    
                }
                
            
                
                
            
            
            ?>
     
        <p id="rate_type">
            Popularity
              <?php  $uncheck = 5 - $a_popularity;
             for($ir=0;$ir<$a_popularity;$ir++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($ir=0;$ir<$uncheck;$ir++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?>
        </p>
        
        <p id="rate_type">Thinking
            <?php  $uncheck = 5 - $a_thinking;
             for($ir=0;$ir<$a_thinking;$ir++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($ir=0;$ir<$uncheck;$ir++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?>
            </p>
            <p id="rate_type">Lengthy <?php  $uncheck = 5 - $a_lengthy;
             for($ir=0;$ir<$a_lengthy;$ir++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($ir=0;$ir<$uncheck;$ir++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?> 
            </p>
            <p id="rate_type">Memory based 
                
                <?php  $uncheck = 5 - $a_memory_based;
             for($ir=0;$ir<$a_memory_based;$ir++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($ir=0;$ir<$uncheck;$ir++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?>
            </p>
            
    
            
          
            
        </div>
        
         <br>
      <br>
      <br>
      <br>
  <div class="ans_click">

      <a href="answers.php?qid=<?php echo $data_set[$i][7]; ?>#submit" target="_blank"><button id="give">Give answer</button></a>
      <a href="answers.php?qid=<?php echo $data_set[$i][7]; ?>" target="_blank"><button id="show">Show answers</button></a>
      
      
        
  </div> 
        
    </div>
    
    
    
    
      <?php 
        if($i<$_SESSION['qna_count']-1)
        goto a_jump;
        
        
        // try some other algorithm , your website cannot rely on this algorithm....
        //bettr luck next time....
        ?>
    </div>
    

    
    
</body>      
</html>