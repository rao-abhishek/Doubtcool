<?php

session_start();
//$_SESSION['message']='';
//$_SESSION['error']=0;
$_SESSION['cur_file']=basename($_SERVER['PHP_SELF']);
$_SESSION['qid']=basename($_SERVER['PHP_SELF'],".php");
//echo $_SESSION['cur_file']."?qid=".$_GET['qid'];"";
$_SESSION['cur_file']="answers/".$_SESSION['cur_file'];

//echo $_SESSION['qid'];
//echo $_SESSION['cur_file'];

$_SESSION['this_file']=$_SESSION['cur_file']."?qid=1911291125290094";
include '../b_connect.php';


if(!isset($_SESSION['logged_in']))
{
  $_SESSION['fname'] = "log" ;
    $_SESSION['lname'] = "in" ;
    
    $_SESSION['email']="guest@doubtcool.com";
}


?>



<!doctype HTML>
<html lang="en">
<head>
    
    <link rel = "icon" href="icon.png" type="image/x-icon">
    <script data-ad-client="ca-pub-1642594700025439" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta charset="utf-8" />
     <meta name="keywords" content="CBSE Study Material, ICSE, NCERT Solutions, CBSE Sample Papers, Live Quesitions, SSC, HSC, CBSE Question Papers, CBSE Solutions, Tutorials, Guess question paper, sample papers, Model question Paper, PSA, Board paper solutions, Revision Notes, Meritnation, Meritnation.com, CPT, IITJEE, AIPMT, NDA, BBA,Previous year questions,JEE mains, JEE advanced ,jee adv, NEET , aims, nda, CAT exam , exam , gate exam ,GATE, question bank, doubtcool , UPSC question , GMAT, entrance exam, important questions, full">
         
   
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153443859-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153443859-2');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WV5L259');</script>
<!-- End Google Tag Manager -->


    
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../w3.css">
    <link rel="stylesheet" type="text/css" href="../d_answers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    $qid=$_SESSION['qid'];
    
    $sql=" select * from q_bank where qid = '$qid';";
    
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    
    $title=$row['q_text'];
    
    
    
    ?>
    <meta name="description" content="<?php echo $title; ?>">
    <title><?php echo $title; ?></title>
    
      
     <link rel="stylesheet" href="../d_jquery_ui.css">
  <link rel="stylesheet" href="../d_ui_custom.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
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
   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV5L259"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    
    <div class="full_body">
    <! left----------hand---------side-------user-------list-----starts------here>
    <div class="user_list">

    <img id="bio_pic" src="../bio_pic.png" width=100px height=110px alt="bio_pic"> 
        <p id="name"><?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></p>
    
    
      <a href="../profile.php"><button id="profile_clicks">View Profile</button></a>
    
    
    
        
            
    <div class="teacher_list">
   <div class="head_type">Active Users</div>
        <div class="all_user">

        <?php
        
        include '../show_active_users.php';
        
        $user_data_set=$_SESSION['user_data_set'];
        
        $pair_color_pack=$_SESSION['pair_color_pack'];
        
        for($i=2;$i<$_SESSION['user_count'];$i++)
        {
        
        
        ?>
        
        <a href="../user.php<?php echo "?uid=".$user_data_set[$i][2]; ?>"><div class="user_tab" style="background-color:<?php echo $pair_color_pack[$user_data_set[$i][3]][1]; ?>">
        <div class="user_tab_name" style="color:<?php echo $pair_color_pack[$user_data_set[$i][3]][0]; ?>">
            <p2><?php  echo $user_data_set[$i][0]." ".$user_data_set[$i][1] ?></p2>
         
        </div>
        
            </div></a>
        
      <?php 
        
        }
        ?>  
        
        <?php 
           for($i=0;$i<1;$i++)
           {
        ?>
        </div>
        <a href="feedback.php" target="_blank"><div class="user_tab" style="margin-top:px;background-color:#0CB566;">
        <div class="user_name" style="color:white;">
        Feedback    
        </div>
        
            </div></a>
             <br>
        <p> <a style="color:black;" href="about.html" target="_blank">About and Contact</a> <br>    © 2020 DOUBTCOOL </p>
            
            
            <?php
           }
            ?>
       
    
    </div> 
        
       
        
        
        
        
        
    
    </div> 
  
    
<! left----------hand---------side--------user--------list------ends------here>   
   
    
 
    <! top--------search----------bar--------starts-----------here>
    
 
<div class="top_search_bar" id="parent_top_bar">
    <div class="top_bar">
    <p4>Doubtcool</p4>
    <a id="re_explore" href="../explore.php">
        <span ><i class="fa fa-chevron-left"></i> Back</span></a>
    </div>
    <a href="../explore.php"><p1 title="Doubtcool">Doubtcool</p1></a>
            <div class="ui-widget">
  <form action="../crawler.php" method="get">
        
     <input id="search_bar" type="text" required name="s" placeholder=" &#8981;   What's your Question ?"/>
    </form>
</div>
  
</div>   

    
<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("parent_top_bar").style.display = "0";
  } else {
    document.getElementById("parent_top_bar").style.top = "-50px";
  }
  prevScrollpos = currentScrollPos;
}
</script>


    
<! top-------search-----------bar---------ends----------here>
  <! upload-----------clicks---------------starts-----------------here>
<div class="upload_clicks" id="hide_it">
    
        <button id="login" onclick="document.getElementById('id01').style.display='block'"  title="Login"></button> 

    
  <!--<button id="filter" title="filter topics, subjects, exams"><i class="fa fa-filter"></i> Filter</button>-->
    
    </div>
    
     <form action="../calluser.php" method="post">
   <!-- <button  id="login" onclick="document.getElementById('id01').style.display='block'"  title="Login"></button> -->
        
  
        
        <div id="id01" class="w3-modal"> 
      <div class="w3-modal-content w3-card-4 w3-animate-zoom">
    
         <div class="w3-container">
       
        <header class="w3-teal">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        </header> 
            
          <label class="w3_label" for="email" ><b>Username</b></label>
      <input   type="text" placeholder="Email id" name="email" autocomplete="off" required><br>

      <label class="w3_label" for="password"><b>Password</b></label>
      <input type="password"  placeholder="Password" name="password" autocomplete="off" required><br>
             
      
             
        <p id="error"><?php
            
            if(isset($_SESSION['error']))
            {        
              
                unset($_SESSION['error']);
                
               echo" <script>
               var button=document.getElementById('login');
                button.click();
                </script>"; 
                
            echo $_SESSION['message'];
                
                 
         
                
            }
            
            
            
            
         
            ?></p>     
        
      <button id="w3_login_button" type="submit">Login</button>
      <label id="checkbox" >
          <br>
          <br>
          <div id="error2">
          don't have a account ? <a href=register.html>Sign up</a>
          </div>
          
          <br>
          <br>
         <input type="checkbox" checked="checked" name="remember">
          Remember me
      </label>   
             
           
       
        </div>
        </div>
        </div>
       
        </form>
  
    

    <?php
    
    if(isset($_SESSION['sign_up']))
{

   unset($_SESSION['sign_up']);
                
               echo" <script>
               var button=document.getElementById('login');
                button.click();
                </script>"; 
        
        
     
    
}
    
    ?>
    
    
    
<!upload-------------clicks-----------------end-------------------------here>   
    
    
    <?php 
    global $vqid;
    
    $vqid=$qid;
   // echo $vqid;
     global $data_set;
    /*$sql="select * from user_info.q_bank;";
    $result=$conn->query($sql);
    
    while($row=$result->fetch_assoc())
    { $sample=$row['q_date_text'];
  
    $sam=str_replace("\n","<br>",$sample);
    echo $sam."<br>";
    
    }*/
    
    
    include '../get_qna_data.php';
    
    $_SESSION['qid_count']=$vqid;
    
    include '../count_visit.php';
     
    setsql("select * from user_info.q_bank where qid='$vqid';");
      global  $i;
      $i=0;
        jump:
       $data_set = getdata($conn);
       $i++;
       
    
    
    ?>
    
    <div class="data_col">
    <div class="qna_box">
    
        
        
        <a href="../user.php?uid=<?php echo $data_set[$i][10];  ?>"><p2 class="qna_name"><?php echo $data_set[$i][0]." ".$data_set[$i][1]; ?></p2></a>
             <p2 class="q_date">uploaded on <?php echo $data_set[$i][2]; ?></p2>
            <p2 class="q_subject"><?php echo $data_set[$i][5]." | ".$data_set[$i][3]." | ".$data_set[$i][4]; ?></p2>
       <div class="border_line"></div>
        <div class="qna_body">
            <div id="title_text">
    <?php
            
$_SESSION['t_subject']=$data_set[$i][3];
$_SESSION['t_topic']=$data_set[$i][4];
$_SESSION['t_exam']=$data_set[$i][5];
            
            
            // $real_text=str_replace("\n","<br>",$data_set[$i][6]);
           echo $data_set[$i][6];
       // echo $real_text;  ?>
            </div>
            <script>
                var titletext = document.getElementById("title_text").innerText;
                document.title= titletext ;
            </script>
            
        </div>
      <!--  <div class="qna_body">
    <?php
            
$_SESSION['t_subject']=$data_set[$i][3];
$_SESSION['t_topic']=$data_set[$i][4];
$_SESSION['t_exam']=$data_set[$i][5];
            
            
            // $real_text=str_replace("\n","<br>",$data_set[$i][6]);
           echo $data_set[$i][6];
       // echo $real_text;  ?>
        </div>-->
       
    <div id="border_line"></div>
        
        
         <div id="parent_rating_box">
 <div class="rating_box">
     
      <?php 
            
         
            
           
            
          
                
                
                $email=$_SESSION['email'];
                $sql="select avg(u_popularity), avg(u_lengthy), avg(u_thinking), avg(u_memory_based) from user_info.user_qna_rating where qid='$vqid' ;";
                $result=$conn->query($sql);
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
             for($i=0;$i<$a_popularity;$i++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($i=0;$i<$uncheck;$i++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?>
        </p>
        
        <p id="rate_type">Thinking
            <?php  $uncheck = 5 - $a_thinking;
             for($i=0;$i<$a_thinking;$i++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($i=0;$i<$uncheck;$i++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?>
            </p>
            <p id="rate_type">Lengthy <?php  $uncheck = 5 - $a_lengthy;
             for($i=0;$i<$a_lengthy;$i++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($i=0;$i<$uncheck;$i++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?> 
            </p>
            <p id="rate_type">Memory based 
                
                <?php  $uncheck = 5 - $a_memory_based;
             for($i=0;$i<$a_memory_based;$i++)
             {
            ?>
          <span class="fa fa-star checked" style="color:gold"></span>
            <?php } 
            for($i=0;$i<$uncheck;$i++)
            {
                ?>
             <span class="fa fa-star checked" style="color:grey"></span>
            <?php } ?>
            </p>
            
        <button id="rate" onclick="getElementById('submit').scrollIntoView(); ">Rate</button>
            
          
            
        </div>
        </div>
        

        
         
    </div>
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
         <div class="ans_count">
             
             <?php if($c_count>0 && $uc_count>0) { ?>

             <b>
             <?php echo $c_count; ?></b> expert answers available & <b><?php echo $uc_count; ?></b> regular answers available
             <?php } ?>
             
              <?php if($c_count==0 && $uc_count>0) { ?>

         
           <b><?php echo $uc_count; ?></b> regular answers available
             <?php } ?>
             
              <?php if($c_count>0 && $uc_count==0) { ?>

         
           <b><?php echo $c_count; ?></b> Expert answers available
             <?php } ?>
             
             <?php if($c_count==0 && $uc_count==0) { ?>

         
             <b><?php echo $c_count; ?></b> answers available , <b>BE THE FIRST ONE TO ANSWER AND GET RECOGNISED BY OUR EXPERTS EASILY </b>
             <?php } ?>
             
        </div>
        
        <?php 
    global $vqid;
    
    $vqid=$qid;
   // echo $vqid;
    // global $data_set;
    /*$sql="select * from user_info.q_bank;";
    $result=$conn->query($sql);
    
    while($row=$result->fetch_assoc())
    { $sample=$row['q_date_text'];
  
    $sam=str_replace("\n","<br>",$sample);
    echo $sam."<br>";
    
    }*/
        include '../quick_sql_functions.php';
        
//**** update each visit********//
        
        

hitback_sql("update user_info.q_bank set q_visit= q_visit+1 where qid='$vqid';",$conn);



//******update each visit********//
        
      
       
$all_count=$c_count+$uc_count;   
        if($all_count>0)
    {    
    include '../get_all_ans.php';
     
    a_setsql("select * from user_info.a_bank where a_qid='$vqid';");
      global  $i;
      $i=0;
        a_jump:
       $data_set = a_getdata($conn);
       $i++;
        
    
    
    ?>
        
         <div id="ans_col" class="qna_box">
    <div id="border_line"></div>
        
             <a href="../user.php?uid=<?php echo $data_set[$i][13];  ?>"><p2 class="qna_name"><?php echo $data_set[$i][0]." ".$data_set[$i][1]; ?></p2></a>
             <p2 class="q_date">uploaded on <?php echo $data_set[$i][2]; ?></p2>
            <p2 class="q_subject"><?php echo $data_set[$i][5]." | ".$data_set[$i][3]." | ".$data_set[$i][4]; ?></p2>
       <div class="border_line"></div>
      
        <div class="qna_body">
            
    <?php
                $text=$data_set[$i][6];
            $text = '<p>' . htmlspecialchars($text) . '</p>'; // HTML ENCODE!
$text = preg_replace('#\n\n\n*#', '</p><p>', $text); // 2 or more \n
$text = preg_replace('#\n#', '<br />', $text); // all left-over \n
$text = preg_replace('#><#', ">\n<", $text);
           // $real_text=str_replace("\n","<br>",$data_set[$i][6]);
            // $real_text=str_replace("<","&#60;",$data_set[$i][6]);
          //echo $data_set[$i][6];
       // echo $real_text;
            echo $text;
       ?> 
        <?php if(strlen($data_set[$i][14])!=0) { ?>
            <pre class="code_box">
            <?php
                
                  $text=$data_set[$i][14];
            $text = '<p>' . htmlspecialchars($text) . '</p>'; // HTML ENCODE!
/*$text = preg_replace('#\n\n\n*#', '</p><p>', $text); // 2 or more \n
$text = preg_replace('#\n#', '<br />', $text); // all left-over \n
$text = preg_replace('#><#', ">\n<", $text);*/
           // $real_text=str_replace("\n","<br>",$data_set[$i][6]);
            // $real_text=str_replace("<","&#60;",$data_set[$i][6]);
          //echo $data_set[$i][6];
       // echo $real_text;
            echo $text;
            
            ?>
            
            </pre>
       
            <?php } ?>
           
            <?php 
             $addr="../uploads/".$data_set[$i][11].".".$data_set[$i][12];
            if(file_exists($addr))  { ?>
        <div class="a_image">
            
            <?php if($data_set[$i][12]==NULL) { ?>
            <img width="700px" src="../uploads/<?php echo $data_set[$i][11].".jpg" ;?>" alt="<?php echo $data_set[$i][11].".jpg" ;?>">
            <?php } else { ?>
         
            <img width="700px" src="../uploads/<?php echo $data_set[$i][11].".".$data_set[$i][12] ;?>" alt="<?php echo $data_set[$i][11];?>">
            <?php } ?>
            
            
        </div> 
            <?php } ?>
        </div>
       
    <div id="border_line"></div>
        
         <?php if($data_set[$i][10]==1)
{?>
        <div class="certify_tag">Certified</div>
        <?php }  ?>
  
       

        
         
    </div>
        
        <?php } ?>
         <?php 
        
       $count = "select count(*) from user_info.a_bank where a_qid='$vqid';";
       $result=$conn->query($count);
        $row=$result->fetch_assoc();
        $count=$row['count(*)'];
        if($i<$count)
        goto a_jump;
        //goto jump;
        
        // try some other algorithm , your website cannot rely on this algorithm....
        //bettr luck next time....
        ?>
        
    
        <form method="post" action="../b_rating.php">
        <div class="rating_box">
            <?php 
            
            global $popularity,$thinking,$lenghty,$memory_based;
            
           
            
            if($_SESSION['email']!="guest@doubtcool.com")
            {
                
                
                $email=$_SESSION['email'];
                $sql="select * from user_info.user_qna_rating where email='$email' and qid='$vqid' ;";
                $result=$conn->query($sql);
                $row= $result->fetch_assoc();
                
                if($result==true)
                {
                    
                 $popularity = $row['u_popularity'] ;
                 $thinking = $row['u_thinking'] ;
                 $lenghty = $row['u_lengthy'] ;
                 $memory_based = $row['u_memory_based'] ;
                    
                }
                
                
                
            }
            
            ?>
            
            
            
           
        <p id="rate_type">
            Popularity </p>
         
            
            
               <fieldset class="p_rating">
                
    <input type="radio" id="star5" name="p_rating" value="5" <?php if($popularity==5) { echo "checked" ; } ?> /><label class = "full" for="star5"></label>
  
    <input type="radio" id="star4" name="p_rating" value="4"<?php if($popularity==4) { echo "checked" ; } ?>  /><label class = "full" for="star4"></label> 

    <input type="radio" id="star3" name="p_rating" value="3" <?php if($popularity==3) { echo "checked" ; } ?> /><label class = "full" for="star3"></label>

    <input type="radio" id="star2" name="p_rating" value="2" <?php if($popularity==2) { echo "checked" ; } ?> /><label class = "full" for="star2"></label>
   
    <input type="radio" id="star1" name="p_rating" value="1" <?php if($popularity==1) { echo "checked" ; } ?> /><label class = "full" for="star1"></label>

</fieldset>
     
            
        <p id="rate_type">Thinking</p>
               <fieldset class="t_rating">
    <input type="radio" id="star10" name="t_rating" value="5" <?php if($thinking==5) { echo "checked" ; } ?> /><label class = "full" for="star10"></label>
  
    <input type="radio" id="star9" name="t_rating" value="4" <?php if($thinking==4) { echo "checked" ; } ?> /><label class = "full" for="star9"></label>

    <input type="radio" id="star8" name="t_rating" value="3" <?php if($thinking==3) { echo "checked" ; } ?> /><label class = "full" for="star8"></label>

    <input type="radio" id="star7" name="t_rating" value="2" <?php if($thinking==2) { echo "checked" ; } ?> /><label class = "full" for="star7"></label>
   
    <input type="radio" id="star6" name="t_rating" value="1" <?php if($thinking==1) { echo "checked" ; } ?>  /><label class = "full" for="star6"></label>

</fieldset>
           
        
          
            <p id="rate_type">Lengthy </p>
               <fieldset class="l_rating">
    <input type="radio" id="star15" name="l_rating" value="5" <?php if($lenghty==5) { echo "checked" ; } ?> /><label class = "full" for="star15"></label>
  
    <input type="radio" id="star14" name="l_rating" value="4" <?php if($lenghty==4) { echo "checked" ; } ?> /><label class = "full" for="star14"></label>

    <input type="radio" id="star13" name="l_rating" value="3" <?php if($lenghty==3) { echo "checked" ; } ?> /><label class = "full" for="star13"></label>

    <input type="radio" id="star12" name="l_rating" value="2" <?php if($lenghty==2) { echo "checked" ; } ?> /><label class = "full" for="star12"></label>
   
    <input type="radio" id="star11" name="l_rating" value="1" <?php if($lenghty==1) { echo "checked" ; } ?> /><label class = "full" for="star11"></label>

</fieldset>
           
             
      
            <p id="rate_type">Memory based </p>
            <fieldset class="m_rating">
    <input type="radio" id="star20" name="m_rating" value="5" <?php if($memory_based==5) { echo "checked" ; } ?>  /><label class = "full" for="star20"></label>
  
    <input type="radio" id="star19" name="m_rating" value="4" <?php if($memory_based==4) { echo "checked" ; } ?> /><label class = "full" for="star19"></label>

    <input type="radio" id="star18" name="m_rating" value="3" <?php if($memory_based==3) { echo "checked" ; } ?> /><label class = "full" for="star18"></label>

    <input type="radio" id="star17" name="m_rating" value="2" <?php if($memory_based==2) { echo "checked" ; } ?> /><label class = "full" for="star17"></label>
   
    <input type="radio" id="star16" name="m_rating" value="1" <?php if($memory_based==1) { echo "checked" ; } ?> /><label class = "full" for="star16"></label>

</fieldset>
             
                      <p id="rate_type" style="color:#0CB566">Rate this Question</p>
            
    <?php $_SESSION['qid']=$vqid; ?>
            
        <button id="rate">Rate</button>
            
           
            </div>
        
        </form>
            
       
        <div class="upload_answer">
            <div id="child_upload_answer">
        <p2 id="giveown">Give your answers</p2>
        <p2 id="tagline">get noticed by Experts</p2>
        <div class="text_box">
<form action="../b_upload_answer.php" method="post" enctype="multipart/form-data">
    <textarea wrap="hard" id="text_place" placeholder="Start typing here..." name="a_text"></textarea>  
    <br>
    <textarea wrap="hard" id="code_place" placeholder="paste your code here..." name="c_text"></textarea>

    <br>
    <br>
    <div id="shownhide">
    <div class="image"> 
        <input type="checkbox" id="zoomcheck">
        <label for="zoomcheck">
    <img id="blah" src="#" alt="your image" />
        </label>
    </div>
    </div>
    <script>
    
   /* $(function () {
  "use strict";
  
  function uncheckBox() {
    var isChecked = $("#zoomcheck").prop("checked");
    if (isChecked) {
      $("#zoomcheck").prop("checked", false);
    }
  }

  $("body").on("click", function () {
    uncheckBox();
  });
  
  $("#zoomcheck").on("click", function (e) {
    e.stopPropagation();
  });
});*/
    
    </script>
    
    
    
    
    <p id="cam_link"  onclick="callimage()"><i class="fa fa-camera" id="icamera" aria-hidden="true"></i><p3 id=camera> Upload Image</p3></p>
    <button id="remove" onclick="unselect()" type="button"><i class="fa fa-times" aria-hidden="true"> remove</i></button>
    
    
    
    <button id="submit" type=submit onclick="uploadimage()">Submit</button>
    
    
    <script>
        
        
        function callimage(){
            
               var button=document.getElementById('fileToUpload');
                button.click();
               
              
            
            var x=document.getElementById("shownhide");
            
            if (x.style.display=="none")
                {
                    x.style.display="block";    
                }
        else
        {
            
            x.style.display="block";
        }
        
           var remove=document.getElementById('remove');
            remove.style.display="inline-block";
             
        }
        
        function shownhide()
        {
          var x=document.getElementById("remove");
            
            if (x.style.display=="none")
                {
                    x.style.display="block";    
                }
        else
        {
            
            x.style.display="block";
        }  
            
        }
    
        function unselect()
        {
            var file = document.getElementById("fileToUpload");
            file.value = null;
            var x=document.getElementById("shownhide");
            x.style.display="none";
            
            return;
            
        }
        
        function uploadimage()
        {
            var button=document.getElementById('uploadimg');
            
        }
        
        
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
                </script>
    
     
    
    
   <div id="hide_it">
    <input type="file"  name="fileToUpload" id="fileToUpload" onchange="readURL(this);" />
    <input type="submit"  value="Upload Image" name="submit" id="uploadimg" />
    </div>  
    

 
    
    
    
    

</form>
    

        </div>
        </div>
    </div>
    </div>
         <script>
        var textarea = document.querySelector('textarea#code_place');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}
    </script>
    </div>
    </body>

</html>