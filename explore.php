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
  $_SESSION['fname'] = "log" ;
    $_SESSION['lname'] = "in" ;
    $_SESSION['email']="guest@doubtcool.com";
    
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
    
    
       <script data-ad-client="ca-pub-1642594700025439" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
     
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WV5L259');</script>
<!-- End Google Tag Manager -->
    
      <link rel = "icon" href="icon.png" type="image/x-icon">
     <meta charset="utf-8" />
    
     <meta name="keywords" content="CBSE Study Material, ICSE, NCERT Solutions, CBSE Sample Papers, Live Quesitions, SSC, HSC, CBSE Question Papers, CBSE Solutions, Tutorials, Guess question paper, sample papers, Model question Paper, PSA, Board paper solutions, Revision Notes, Meritnation, Meritnation.com, CPT, IITJEE, AIPMT, NDA, BBA,Previous year questions,JEE mains, JEE advanced ,jee adv, NEET , aims, nda, CAT exam , exam , gate exam ,GATE, question bank, doubtcool , UPSC question , GMAT, entrance exam, important questions, full">
         
    <meta name="description" content="Get all you doubts cleared , Get expert certified answer for free, get all textbook solution here for free , important questions for entrance exam(JEE Mains, JEE Advanced , NEET ,AIMS, UPSC )">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="w3.css">
    <link rel="stylesheet" type="text/css" href="d_explore.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Explore | Doubtcool</title>
    
    
     <link rel="stylesheet" href="d_jquery_ui.css">
  <link rel="stylesheet" href="d_ui_custom.css">
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
    
   <!-- <button  id="login" onclick="document.getElementById('id01').style.display='block'"  title="Login"></button> -->

<div class="full_body">
<! left----------hand---------side-------user-------list-----starts------here>
    <div class="user_list">

    <img id="bio_pic" src="bio_pic.png" width=100px height=110px alt="bio_pic"> 
        <p id="name"><?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></p>
    
    
        <a href="profile.php"><button id="profile_clicks">View Profile</button></a>
    
    
    <div class="teacher_list">
   <div class="head_type">Active Users</div>
        <div class="all_user">

        <?php
        
        include 'show_active_users.php';
        
        $user_data_set=$_SESSION['user_data_set'];
        
        $pair_color_pack=$_SESSION['pair_color_pack'];
        
        for($i=2;$i<$_SESSION['user_count'];$i++)
        {
        
        
        ?>
        
        <a href="user.php<?php echo "?uid=".$user_data_set[$i][4]; ?>"><div class="user_tab" style="background-color:<?php echo $pair_color_pack[$user_data_set[$i][3]][1]; ?>">
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
            
            <?php
           }
            ?>
       
    
    </div> 
        
    
    </div>
<! left----------hand---------side--------user--------list------ends------here>        
<! top--------search----------bar--------starts-----------here>
    
    
    
<div class="top_search_bar">
    <a href="home.php"><p1 title="Doubtcool">Doubtcool</p1></a>
        <div class="ui-widget">
  <form action="crawler.php" method="get">
        
     <input id="search_bar" type="text" value="<?php $_SESSION['search_q']; ?>" required name="s" placeholder=" &#8981;   What's your Question ?"/>
    </form>
</div>
    
    
    
</div>    
<! top-------search-----------bar---------ends----------here>
    
    
<! upload-----------clicks---------------starts-----------------here>
<div class="upload_clicks">
   
   
  <a title="Upload your Questions here" id="question" href="Questions.php">Upload your Question</a>
    
   
    
       
    
        <button  id="login" onclick="document.getElementById('id01').style.display='block'"  title="Login"></button> 

    
  <button id="filter" onclick="drop_filter()" title="filter topics, subjects, exams"><i class="fa fa-filter"></i> Filter</button>
    
    </div>
    
    
     <form action="calluser.php" method="post">
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
     
    <div class="data_col">
      <div id="parent_filter" style="display:none; ">
    <div class="fil_container"  >
        
        <script>
      
         function drop_filter()
         {
             
             
             x = document.getElementById("parent_filter");
             document.body.scrollTop=0;
             if(x.style.display=='none')
                 {
                   
                     x.style.display='block';
                   

                 }
             
             else if(x.style.display=='block')
                 {
    
                     x.style.display='none';
                  
                 }
             
             else
             {
                 
                 x.style.display='none';
             
             }  
         }
            
            
          /* function fil_by_exam(e_name)
            {
                if(e_name=="JEE Mains")
                    {
                        
                        
                        
                    }
                
                
            }*/
    
         </script>
        
        
        <form method="post" action="apply_filter.php">
        <div class="exam">
         
            
        <h4>Exams</h4>
        <select id="exam_col" name="exam"  onChange="fil_by_exam(this.value);" >
            
               <?php 
            
            global $e_id , $e_value , $e_text ;
            
             $fe_sql="SELECT * FROM user_info.filter_exam;";
             $fe_sqlc="SELECT count(*) FROM user_info.filter_exam;";
            
             
            
             $count=$conn->query($fe_sqlc);
             $crow = $count->fetch_assoc();
            
             $lim = $crow['count(*)'];
             
            $result=$conn->query($fe_sql);
       
             for($i=0;$i<$lim;$i++)
             {
                
                $row = $result->fetch_assoc();
                 
                $e_id[$i] = $row['e_id'];
                $e_value[$i] = $row['e_value'];
                $e_text[$i] = $row['e_text'];
                 
             }
            
            for($i=0;$i<$lim;$i++)
            {
            ?>
         
            
         <option id="<?php echo $e_id[$i]; ?>"  value="<?php echo $e_value[$i]; ?>"  style="display:block;" ><?php echo $e_text[$i]; } ?></option>
        
           <option id="other" value="other" selected >all</option>
            
        </select>
            
        <br>
        </div>
        
        <div class="subject">
        <h4>Subjects</h4>
        <select id="subject_col" name="subject"  onChange="fil_by_subject(this.value);" >
        
          <?php 
            
            global $s_id , $s_value , $s_text ;
            
             $fs_sql="SELECT * FROM user_info.filter_subject;";
             $fs_sqlc="SELECT count(*) FROM user_info.filter_subject;";
            
             
            
             $count=$conn->query($fs_sqlc);
             $crow = $count->fetch_assoc();
            
             $lim = $crow['count(*)'];
             
            $result=$conn->query($fs_sql);
       
             for($i=0;$i<$lim;$i++)
             {
                
                $row = $result->fetch_assoc();
                 
                $s_id[$i] = $row['s_id'];
                $s_value[$i] = $row['s_value'];
                $s_text[$i] = $row['s_text'];
             }
            
            for($i=0;$i<$lim;$i++)
            {
            ?>
         
            
         <option id="<?php echo $s_id[$i]; ?>" value="<?php echo $s_value[$i]; ?>"  style="display:block;" ><?php echo $s_text[$i]; } ?></option>
           
               <option id="other" value="other" selected >all</option>
       
        
        </select>
            <br>
        </div>
        
        <div class="topic">
        <h4>Topics</h4>
        <select id="topic_col" name="topic"  onChange="fil_by_topic(this.value);" >
            
             <?php 
            
            global $t_id , $t_value , $t_text ;
            
             $ft_sql="SELECT * FROM user_info.filter_topic;";
             $ft_sqlc="SELECT count(*) FROM user_info.filter_topic;";
            
             
            
             $count=$conn->query($ft_sqlc);
             $crow = $count->fetch_assoc();
            
             $lim = $crow['count(*)'];
             
            $result=$conn->query($ft_sql);
       
             for($i=0;$i<$lim;$i++)
             {
                
                $row = $result->fetch_assoc();
                 
                $t_id[$i] = $row['t_id'];
                $t_value[$i] = $row['t_value'];
                $t_text[$i] = $row['t_text'];
             }
            
            for($i=0;$i<$lim;$i++)
            {
            ?>
            
         <option id="<?php echo $t_id[$i]; ?>" value="<?php echo $t_value[$i]; ?>"  style="display:block;" ><?php echo $t_text[$i]; } ?></option>
            
        <option id="other" value="other" selected >all</option>
            
        </select>
        
        
        </div>
        
        
        <button class="apply_filter"  >Apply Filter</button>
        </form>
        
        
        <script>
                
              
            function fil_by_subject(subject)
            {
             var s_value;
                
                s_value = subject;
                
                if(s_value=="mathematics"||s_value=="mathapt")
                    {
                            
                            
                                       document.getElementById('com_num').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('the_equ').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('seq_ser').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('pre_com').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('bin_the').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('Pro_mat').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('mat_det').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('fun_mat').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('lcd_mat').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('app_der').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('ind_int').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('def_int').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('are').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('dif_equ').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('slpsl').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('cir').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('par').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('ell').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('hyp_mat').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('tri').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('tri_equ').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('icf_mat').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('pro_tri').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('vec_mat').style.display='block';
                            
                                                                    
                     
                                                            
                                       document.getElementById('3d_geo').style.display='block';
                            
                        
                                     
                                             
                        
                        
                                       document.getElementById('ato_str').style.display='none'; 
                     
                                                            
                                     
                        
                                       document.getElementById('mod_phy').style.display='none';
                            
                                       document.getElementById('pcpp').style.display='none'; 
                     
                                                            
                                     
                            
                                           document.getElementById('che_bon').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('sta_mat').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('cie').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('the_the').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('sol_sta').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('scp').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('ele_che').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('che_kin').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('nuc_che').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('sur_che').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('s_blo_ele').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('p_blo_ele_1').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('tite').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('coo_con').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('qua_ana').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('ocb').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('hyd').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('alk_hal').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('alc_eth').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('ald_ket').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('cad').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('accn').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('bab').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('arccn').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('ahp').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('aaka').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('bcel').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('kin_phy').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('gen_phy').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('law_mot').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('wpe').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('cen_mas').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('rot').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('gra').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('shm').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('pro_mat_phy').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('wav_mot').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('hea_the').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('opt').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('cur_ele').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('ele_phy').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('mag').style.display='none'; 
                     
                                                            
                                     
                            
                                                                            document.getElementById('eiac').style.display='none'; 
                        
                        document.getElementById('bio_cla').style.display="none";
                               
                                            
                                 document.getElementById('pri_inh').style.display="none";
                               
                                            
                                 document.getElementById('mor_flo').style.display="none";
                               
                                            
                                 document.getElementById('ani_kin').style.display="none";
                               
                                            
                                 document.getElementById('rep').style.display="none";
                               
                                            
                                 document.getElementById('eco').style.display="none";
                               
                                            
                                 document.getElementById('mol_bas').style.display="none";
                               
                                            
                                 document.getElementById('neu_con').style.display="none";
                               
                                            
                                 document.getElementById('bio_pri').style.display="none";
                               
                                            
                                 document.getElementById('ana_flo').style.display="none";
                               
                                            
                                 document.getElementById('loc_mov').style.display="none";
                               
                                            
                                 document.getElementById('mic_hum').style.display="none";
                               
                                            
                                 document.getElementById('pho').style.display="none";
                               
                                            
                                 document.getElementById('che_coo').style.display="none";
                               
                                            
                                 document.getElementById('evo').style.display="none";
                               
                                            
                                 document.getElementById('exc_pro').style.display="none";
                               
                                            
                                 document.getElementById('bio_mol').style.display="none";
                               
                                            
                                 document.getElementById('org_pop').style.display="none";
                               
                                            
                                 document.getElementById('str_org').style.display="none";
                               
                                            
                                 document.getElementById('cel_cyc').style.display="none";
                               
                                            
                                 document.getElementById('bio_app').style.display="none";
                               
                                            
                                 document.getElementById('str_enh').style.display="none";
                               
                                            
                                 document.getElementById('dig_abs').style.display="none";
                               
                                            
                                 document.getElementById('tra_pla').style.display="none";
                               
                                            
                                 document.getElementById('min_nut').style.display="none";
                               
                                            
                                 document.getElementById('bre_exc').style.display="none";
                               
                                            
                                 document.getElementById('pla_gro').style.display="none";
                     
                        
                    
                        
                    }
                
                else if(s_value=="physics")
                {       
                        document.getElementById('gen_phy').style.display="block";
                        document.getElementById('gen_phy').style.display="block";
                        document.getElementById('law_mot').style.display="block";
                        document.getElementById('wpe').style.display="block";
                        document.getElementById('cen_mas').style.display="block";
                        document.getElementById('rot').style.display="block";
                        document.getElementById('gra').style.display="block";
                        document.getElementById('shm').style.display="block";
                        document.getElementById('pro_mat_phy').style.display="block";
                        document.getElementById('wav_mot').style.display="block";
                        document.getElementById('hea_the').style.display="block";
                        document.getElementById('opt').style.display="block";
                        document.getElementById('cur_ele').style.display="block";
                        document.getElementById('ele_phy').style.display="block";
                        document.getElementById('mag').style.display="block";
                        document.getElementById('eiac').style.display="block";
                        document.getElementById('mod_phy').style.display="block";
                        document.getElementById('com_num').style.display="none";
                        document.getElementById('ato_str').style.display="none";
                        document.getElementById('pcpp').style.display="none";
                        document.getElementById('che_bon').style.display="none";
                        document.getElementById('sta_mat').style.display="none";
                        document.getElementById('cie').style.display="none";
                        document.getElementById('the_the').style.display="none";
                        document.getElementById('sol_sta').style.display="none";
                        document.getElementById('scp').style.display="none";
                        document.getElementById('ele_che').style.display="none";
                        document.getElementById('che_kin').style.display="none";
                        document.getElementById('nuc_che').style.display="none";
                        document.getElementById('sur_che').style.display="none";
                        document.getElementById('s_blo_ele').style.display="none";
                        document.getElementById('p_blo_ele_1').style.display="none";
                        document.getElementById('tite').style.display="none";
                        document.getElementById('coo_con').style.display="none";
                        document.getElementById('qua_ana').style.display="none";
                        document.getElementById('ocb').style.display="none";
                        document.getElementById('hyd').style.display="none";
                        document.getElementById('alk_hal').style.display="none";
                        document.getElementById('alc_eth').style.display="none";
                        document.getElementById('ald_ket').style.display="none";
                        document.getElementById('cad').style.display="none";
                        document.getElementById('accn').style.display="none";
                        document.getElementById('bab').style.display="none";
                        document.getElementById('arccn').style.display="none";
                        document.getElementById('ahp').style.display="none";
                        document.getElementById('aaka').style.display="none";
                        document.getElementById('bcel').style.display="none";
                        document.getElementById('kin_phy').style.display="none";
                        document.getElementById('com_num').style.display="none";
                        document.getElementById('the_equ').style.display="none";
                        document.getElementById('seq_ser').style.display="none";
                        document.getElementById('pre_com').style.display="none";
                        document.getElementById('bin_the').style.display="none";
                        document.getElementById('Pro_mat').style.display="none";
                        document.getElementById('mat_det').style.display="none";
                        document.getElementById('fun_mat').style.display="none";
                        document.getElementById('lcd_mat').style.display="none";
                        document.getElementById('app_der').style.display="none";
                        document.getElementById('ind_int').style.display="none";
                        document.getElementById('def_int').style.display="none";
                        document.getElementById('are').style.display="none";
                        document.getElementById('dif_equ').style.display="none";
                        document.getElementById('slpsl').style.display="none";
                        document.getElementById('cir').style.display="none";
                        document.getElementById('par').style.display="none";
                        document.getElementById('ell').style.display="none";
                        document.getElementById('hyp_mat').style.display="none";
                        document.getElementById('tri').style.display="none";
                        document.getElementById('tri_equ').style.display="none";
                        document.getElementById('icf_mat').style.display="none";
                        document.getElementById('pro_tri').style.display="none";
                        document.getElementById('vec_mat').style.display="none";
                        document.getElementById('3d_geo').style.display="none";
                    
                    document.getElementById('bio_cla').style.display="none";
                               
                                            
                                 document.getElementById('pri_inh').style.display="none";
                               
                                            
                                 document.getElementById('mor_flo').style.display="none";
                               
                                            
                                 document.getElementById('ani_kin').style.display="none";
                               
                                            
                                 document.getElementById('rep').style.display="none";
                               
                                            
                                 document.getElementById('eco').style.display="none";
                               
                                            
                                 document.getElementById('mol_bas').style.display="none";
                               
                                            
                                 document.getElementById('neu_con').style.display="none";
                               
                                            
                                 document.getElementById('bio_pri').style.display="none";
                               
                                            
                                 document.getElementById('ana_flo').style.display="none";
                               
                                            
                                 document.getElementById('loc_mov').style.display="none";
                               
                                            
                                 document.getElementById('mic_hum').style.display="none";
                               
                                            
                                 document.getElementById('pho').style.display="none";
                               
                                            
                                 document.getElementById('che_coo').style.display="none";
                               
                                            
                                 document.getElementById('evo').style.display="none";
                               
                                            
                                 document.getElementById('exc_pro').style.display="none";
                               
                                            
                                 document.getElementById('bio_mol').style.display="none";
                               
                                            
                                 document.getElementById('org_pop').style.display="none";
                               
                                            
                                 document.getElementById('str_org').style.display="none";
                               
                                            
                                 document.getElementById('cel_cyc').style.display="none";
                               
                                            
                                 document.getElementById('bio_app').style.display="none";
                               
                                            
                                 document.getElementById('str_enh').style.display="none";
                               
                                            
                                 document.getElementById('dig_abs').style.display="none";
                               
                                            
                                 document.getElementById('tra_pla').style.display="none";
                               
                                            
                                 document.getElementById('min_nut').style.display="none";
                               
                                            
                                 document.getElementById('bre_exc').style.display="none";
                               
                                            
                                 document.getElementById('pla_gro').style.display="none";
                    
                    
                }
                
                else if(s_value=="chemistry")
                    {
                        document.getElementById('ato_str').style.display='block'; 
                        document.getElementById('pcpp').style.display='block';
                        document.getElementById('che_bon').style.display='block';
                        document.getElementById('sta_mat').style.display='block'; 
                        document.getElementById('cie').style.display='block';
                        document.getElementById('the_the').style.display='block'; 
                        document.getElementById('sol_sta').style.display='block'; 
                        document.getElementById('scp').style.display='block'; 
                        document.getElementById('ele_che').style.display='block';
                        document.getElementById('che_kin').style.display='block'; 
                        document.getElementById('nuc_che').style.display='block';
                        document.getElementById('sur_che').style.display='block'; 
                        document.getElementById('s_blo_ele').style.display='block'; 
                        document.getElementById('p_blo_ele_1').style.display='block'; 
                        document.getElementById('tite').style.display='block'; 
                        document.getElementById('coo_con').style.display='block';
                        document.getElementById('qua_ana').style.display='block';
                        document.getElementById('ocb').style.display='block'; 
                        document.getElementById('hyd').style.display='block'; 
                        document.getElementById('alk_hal').style.display='block'; 
                        document.getElementById('alc_eth').style.display='block';
                        document.getElementById('ald_ket').style.display='block'; 
                        document.getElementById('cad').style.display='block';
                        document.getElementById('accn').style.display='block'; 
                        document.getElementById('bab').style.display='block';
                        document.getElementById('arccn').style.display='block'; 
                        document.getElementById('ahp').style.display='block'; 
                        document.getElementById('aaka').style.display='block'; 
                        document.getElementById('bcel').style.display='block'; 
                        document.getElementById('kin_phy').style.display='block'; 
                        
                        document.getElementById('com_num').style.display="none";
                        document.getElementById('the_equ').style.display="none";
                        document.getElementById('seq_ser').style.display="none";
                        document.getElementById('pre_com').style.display="none";
                        document.getElementById('bin_the').style.display="none";
                        document.getElementById('Pro_mat').style.display="none";
                        document.getElementById('mat_det').style.display="none";
                        document.getElementById('fun_mat').style.display="none";
                        document.getElementById('lcd_mat').style.display="none";
                        document.getElementById('app_der').style.display="none";
                        document.getElementById('ind_int').style.display="none";
                        document.getElementById('def_int').style.display="none";
                        document.getElementById('are').style.display="none";
                        document.getElementById('dif_equ').style.display="none";
                        document.getElementById('slpsl').style.display="none";
                        document.getElementById('cir').style.display="none";
                        document.getElementById('par').style.display="none";
                        document.getElementById('ell').style.display="none";
                        document.getElementById('hyp_mat').style.display="none";
                        document.getElementById('tri').style.display="none";
                        document.getElementById('tri_equ').style.display="none";
                        document.getElementById('icf_mat').style.display="none";
                        document.getElementById('pro_tri').style.display="none";
                        document.getElementById('vec_mat').style.display="none";
                        document.getElementById('3d_geo').style.display="none";
                        
                     document.getElementById('gen_phy').style.display='none';
                     document.getElementById('law_mot').style.display='none'; 
                     document.getElementById('wpe').style.display='none'; 
                     document.getElementById('cen_mas').style.display='none'; 
                     document.getElementById('rot').style.display='none'; 
                     document.getElementById('gra').style.display='none'; 
                     document.getElementById('shm').style.display='none'; 
                     document.getElementById('pro_mat_phy').style.display='none'; 
                     document.getElementById('wav_mot').style.display='none'; 
                     document.getElementById('hea_the').style.display='none'; 
                     document.getElementById('opt').style.display='none';
                     document.getElementById('cur_ele').style.display='none';
                     document.getElementById('ele_phy').style.display='none'; 
                     document.getElementById('mag').style.display='none';
                     document.getElementById('eiac').style.display='none'; 
                     document.getElementById('bio_cla').style.display="none";
                     document.getElementById('pri_inh').style.display="none";
                     document.getElementById('mor_flo').style.display="none";
                     document.getElementById('ani_kin').style.display="none";
                     document.getElementById('rep').style.display="none";
                     document.getElementById('eco').style.display="none";
                               
                                            
                                 document.getElementById('mol_bas').style.display="none";
                               
                                            
                                 document.getElementById('neu_con').style.display="none";
                               
                                            
                                 document.getElementById('bio_pri').style.display="none";
                               
                                            
                                 document.getElementById('ana_flo').style.display="none";
                               
                                            
                                 document.getElementById('loc_mov').style.display="none";
                               
                                            
                                 document.getElementById('mic_hum').style.display="none";
                               
                                            
                                 document.getElementById('pho').style.display="none";
                               
                                            
                                 document.getElementById('che_coo').style.display="none";
                               
                                            
                                 document.getElementById('evo').style.display="none";
                               
                                            
                                 document.getElementById('exc_pro').style.display="none";
                               
                                            
                                 document.getElementById('bio_mol').style.display="none";
                               
                                            
                                 document.getElementById('org_pop').style.display="none";
                               
                                            
                                 document.getElementById('str_org').style.display="none";
                               
                                            
                                 document.getElementById('cel_cyc').style.display="none";
                               
                                            
                                 document.getElementById('bio_app').style.display="none";
                               
                                            
                                 document.getElementById('str_enh').style.display="none";
                               
                                            
                                 document.getElementById('dig_abs').style.display="none";
                               
                                            
                                 document.getElementById('tra_pla').style.display="none";
                               
                                            
                                 document.getElementById('min_nut').style.display="none";
                               
                                            
                                 document.getElementById('bre_exc').style.display="none";
                               
                                            
                                 document.getElementById('pla_gro').style.display="none";
                     
                        
                        
                        
                    }
                
                
                
                
                else if (s_value=="biology")
                    {  
                        
                        
                        document.getElementById('bio_cla').style.display="block";
                        document.getElementById('pri_inh').style.display="block";
                        document.getElementById('mor_flo').style.display="block";
                        document.getElementById('ani_kin').style.display="block";
                        document.getElementById('rep').style.display="block";
                        document.getElementById('eco').style.display="block";
                        document.getElementById('mol_bas').style.display="block";
                        document.getElementById('neu_con').style.display="block";
                        document.getElementById('bio_pri').style.display="block";
                        document.getElementById('ana_flo').style.display="block";
                        document.getElementById('loc_mov').style.display="block";
                        document.getElementById('mic_hum').style.display="block";
                        document.getElementById('pho').style.display="block";
                        document.getElementById('che_coo').style.display="block";
                        document.getElementById('evo').style.display="block";
                        document.getElementById('exc_pro').style.display="block";
                        document.getElementById('bio_mol').style.display="block";
                        document.getElementById('org_pop').style.display="block";
                        document.getElementById('str_org').style.display="block";
                        document.getElementById('cel_cyc').style.display="block";
                        document.getElementById('bio_app').style.display="block";
                        document.getElementById('str_enh').style.display="block";
                        document.getElementById('dig_abs').style.display="block";
                        document.getElementById('tra_pla').style.display="block";
                        document.getElementById('min_nut').style.display="block";
                        document.getElementById('bre_exc').style.display="block";
                        document.getElementById('pla_gro').style.display="block";
                        document.getElementById('com_num').style.display="none";
                        document.getElementById('ato_str').style.display="none";
                        document.getElementById('pcpp').style.display="none";
                        document.getElementById('che_bon').style.display="none";
                        document.getElementById('sta_mat').style.display="none";
                        document.getElementById('cie').style.display="none";
                        document.getElementById('the_the').style.display="none";
                        document.getElementById('sol_sta').style.display="none";
                        document.getElementById('scp').style.display="none";
                        document.getElementById('ele_che').style.display="none";
                        document.getElementById('che_kin').style.display="none";
                        document.getElementById('nuc_che').style.display="none";
                        document.getElementById('sur_che').style.display="none";
                        document.getElementById('s_blo_ele').style.display="none";
                        document.getElementById('p_blo_ele_1').style.display="none";
                        document.getElementById('tite').style.display="none";
                        document.getElementById('coo_con').style.display="none";
                        document.getElementById('qua_ana').style.display="none";
                        document.getElementById('ocb').style.display="none";
                        document.getElementById('hyd').style.display="none";
                        document.getElementById('alk_hal').style.display="none";
                        document.getElementById('alc_eth').style.display="none";
                        document.getElementById('ald_ket').style.display="none";
                        document.getElementById('cad').style.display="none";
                        document.getElementById('accn').style.display="none";
                        document.getElementById('bab').style.display="none";
                        document.getElementById('arccn').style.display="none";
                        document.getElementById('ahp').style.display="none";
                        document.getElementById('aaka').style.display="none";
                        document.getElementById('bcel').style.display="none";
                        document.getElementById('kin_phy').style.display="none";
                        document.getElementById('com_num').style.display="none";
                        document.getElementById('the_equ').style.display="none";
                        document.getElementById('seq_ser').style.display="none";
                        document.getElementById('pre_com').style.display="none";
                        document.getElementById('bin_the').style.display="none";
                        document.getElementById('Pro_mat').style.display="none";
                        document.getElementById('mat_det').style.display="none";
                        document.getElementById('fun_mat').style.display="none";
                        document.getElementById('lcd_mat').style.display="none";
                        document.getElementById('app_der').style.display="none";
                        document.getElementById('ind_int').style.display="none";
                        document.getElementById('def_int').style.display="none";
                        document.getElementById('are').style.display="none";
                        document.getElementById('dif_equ').style.display="none";
                        document.getElementById('slpsl').style.display="none";
                        document.getElementById('cir').style.display="none";
                        document.getElementById('par').style.display="none";
                        document.getElementById('ell').style.display="none";
                        document.getElementById('hyp_mat').style.display="none";
                        document.getElementById('tri').style.display="none";
                        document.getElementById('tri_equ').style.display="none";
                        document.getElementById('icf_mat').style.display="none";
                        document.getElementById('pro_tri').style.display="none";
                        document.getElementById('vec_mat').style.display="none";
                        document.getElementById('3d_geo').style.display="none";
                        document.getElementById('mod_phy').style.display='none';
                        document.getElementById('gen_phy').style.display='none';
                        document.getElementById('law_mot').style.display='none'; 
                        document.getElementById('wpe').style.display='none'; 
                        document.getElementById('cen_mas').style.display='none'; 
                        document.getElementById('rot').style.display='none'; 
                        document.getElementById('gra').style.display='none'; 
                        document.getElementById('shm').style.display='none'; 
                        document.getElementById('pro_mat_phy').style.display='none'; 
                        document.getElementById('wav_mot').style.display='none'; 
                        document.getElementById('hea_the').style.display='none'; 
                        document.getElementById('opt').style.display='none';
                        document.getElementById('cur_ele').style.display='none';
                        document.getElementById('ele_phy').style.display='none'; 
                        document.getElementById('mag').style.display='none';
                        document.getElementById('eiac').style.display='none'; 
                    
                    
                    }
                
            }
            
            </script>
        
                <script>
            function fil_by_exam(exam)
                {
                    var e_value   ;
                    
                    e_value = exam;
                    
                  
                    
                    
                    
                    if(e_value=="jeemains" || e_value=="jeeadvanced" || e_value=="bitsat" || e_value=="viteee" || e_value=="kvpy" || e_value=="iisc" || e_value=="niftem" || e_value=="iist" || e_value=="srmjeee" || e_value=="gujcet" || e_value=="imucet" || e_value=="inbtech" || e_value=="tes" || e_value =="ndanae" || e_value == "nest" || e_value=="cbse" || e_value == "statebord" || e_value=="comedk" || e_value=="manipalbtech" || e_value=="amubtech" )
                        {
                            
                         <?php
                            
                          //  global $lim;
                            
                            $ff2_s = "select s_id from user_info.filter_subject ;";
                            $cff2_s = "select count(*) from user_info.filter_subject ;";
                            
                            $count=$conn->query($cff2_s);
                            $crow = $count->fetch_assoc();
                            
                            $lim = $crow['count(*)'];
                            
                            $result=$conn->query($ff2_s);
       
                            /*  filter in subject column */
                            for($i=0;$i<$lim;$i++)
                 
                                {
                
                                 $row = $result->fetch_assoc();
                 
                                 $s_id[$i] = $row['s_id'];
              
                 
                                 if($s_id[$i]=="mathematics" || $s_id[$i]=="physics" || $s_id[$i]=="chemistry")
                                      {  ?>
                      
                                       document.getElementById('<?php echo $s_id[$i]; ?>').style.display='block';
                            
                                      <?php }
              
                                 else
                                      { ?>
                                      document.getElementById('<?php echo $s_id[$i]; ?>').style.display='none'; 
                     
                                      <?php  
                                      }
                                  
                                
                                
                                
             
                                }
                            
                        
                            ?>
                                
                           
                             document.getElementById('ato_str').style.display='block';
                                
                                                           
                            document.getElementById('pcpp').style.display='block';
                                
                                                           
                            document.getElementById('che_bon').style.display='block';
                                
                                                           
                            document.getElementById('sta_mat').style.display='block';
                                
                                                           
                            document.getElementById('cie').style.display='block';
                                
                                                           
                            document.getElementById('the_the').style.display='block';
                                
                                                           
                            document.getElementById('sol_sta').style.display='block';
                                
                                                           
                            document.getElementById('scp').style.display='block';
                                
                                                           
                            document.getElementById('ele_che').style.display='block';
                                
                                                           
                            document.getElementById('che_kin').style.display='block';
                                
                                                           
                            document.getElementById('nuc_che').style.display='block';
                                
                                                           
                            document.getElementById('sur_che').style.display='block';
                                
                                                           
                            document.getElementById('s_blo_ele').style.display='block';
                                
                                                           
                            document.getElementById('p_blo_ele_1').style.display='block';
                                
                                                           
                            document.getElementById('tite').style.display='block';
                                
                                                           
                            document.getElementById('coo_con').style.display='block';
                                
                                                           
                            document.getElementById('qua_ana').style.display='block';
                                
                                                           
                            document.getElementById('ocb').style.display='block';
                                
                                                           
                            document.getElementById('hyd').style.display='block';
                                
                                                           
                            document.getElementById('alk_hal').style.display='block';
                                
                                                           
                            document.getElementById('alc_eth').style.display='block';
                                
                                                           
                            document.getElementById('ald_ket').style.display='block';
                                
                                                           
                            document.getElementById('cad').style.display='block';
                                
                                                           
                            document.getElementById('accn').style.display='block';
                                
                                                           
                            document.getElementById('bab').style.display='block';
                                
                                                           
                            document.getElementById('arccn').style.display='block';
                                
                                                           
                            document.getElementById('ahp').style.display='block';
                                
                                                           
                            document.getElementById('aaka').style.display='block';
                                
                                                           
                            document.getElementById('bcel').style.display='block';
                                
                                                           
                            document.getElementById('kin_phy').style.display='block';
                                
                                                           
                            document.getElementById('gen_phy').style.display='block';
                                
                                                           
                            document.getElementById('law_mot').style.display='block';
                                
                                                           
                            document.getElementById('wpe').style.display='block';
                                
                                                           
                            document.getElementById('cen_mas').style.display='block';
                                
                                                           
                            document.getElementById('rot').style.display='block';
                                
                                                           
                            document.getElementById('gra').style.display='block';
                                
                                                           
                            document.getElementById('shm').style.display='block';
                                
                                                           
                            document.getElementById('pro_mat_phy').style.display='block';
                                
                                                           
                            document.getElementById('wav_mot').style.display='block';
                                
                                                           
                            document.getElementById('hea_the').style.display='block';
                                
                                                           
                            document.getElementById('opt').style.display='block';
                                
                                                           
                            document.getElementById('cur_ele').style.display='block';
                                
                                                           
                            document.getElementById('ele_phy').style.display='block';
                                
                                                           
                            document.getElementById('mag').style.display='block';
                                
                                                           
                            document.getElementById('eiac').style.display='block';
                                
                                                           
                            document.getElementById('mod_phy').style.display='block';
                                
                                                           
                            document.getElementById('com_num').style.display='block';
                                
                                                           
                            document.getElementById('the_equ').style.display='block';
                                
                                                           
                            document.getElementById('seq_ser').style.display='block';
                                
                                                           
                            document.getElementById('pre_com').style.display='block';
                                
                                                           
                            document.getElementById('bin_the').style.display='block';
                                
                                                           
                            document.getElementById('Pro_mat').style.display='block';
                                
                                                           
                            document.getElementById('mat_det').style.display='block';
                                
                                                           
                            document.getElementById('fun_mat').style.display='block';
                                
                                                           
                            document.getElementById('lcd_mat').style.display='block';
                                
                                                           
                            document.getElementById('app_der').style.display='block';
                                
                                                           
                            document.getElementById('ind_int').style.display='block';
                                
                                                           
                            document.getElementById('def_int').style.display='block';
                                
                                                           
                            document.getElementById('are').style.display='block';
                                
                                                           
                            document.getElementById('dif_equ').style.display='block';
                                
                                                           
                            document.getElementById('slpsl').style.display='block';
                                
                                                           
                            document.getElementById('cir').style.display='block';
                                
                                                           
                            document.getElementById('par').style.display='block';
                                
                                                           
                            document.getElementById('ell').style.display='block';
                                
                                                           
                            document.getElementById('hyp_mat').style.display='block';
                                
                                                           
                            document.getElementById('tri').style.display='block';
                                
                                                           
                            document.getElementById('tri_equ').style.display='block';
                                
                                                           
                            document.getElementById('icf_mat').style.display='block';
                                
                                                           
                            document.getElementById('pro_tri').style.display='block';
                                
                                                           
                            document.getElementById('vec_mat').style.display='block';
                                
                                                           
                            document.getElementById('3d_geo').style.display='block';
                            
                        
                            
                            
                        }
                    
                    
                    else if (e_value=="neet" || e_value=="aiims" || e_value=="nest" || e_value=="cmc" )
                        {
                          
                                   
                         <?php
                            
                          //  global $lim;
                            
                            $ff2_s = "select s_id from user_info.filter_subject ;";
                            $cff2_s = "select count(*) from user_info.filter_subject ;";
                            
                            $count=$conn->query($cff2_s);
                            $crow = $count->fetch_assoc();
                            
                            $lim = $crow['count(*)'];
                            
                            $result=$conn->query($ff2_s);
       
                            /*  filter in subject column */
                            for($i=0;$i<$lim;$i++)
                 
                                {
                
                                 $row = $result->fetch_assoc();
                 
                                 $s_id[$i] = $row['s_id'];
              
                 
                                 if($s_id[$i]=="biology" || $s_id[$i]=="physics" || $s_id[$i]=="chemistry" || $s_id[$i]=="mathematics")
                                      {  ?>
                      
                                       document.getElementById('<?php echo $s_id[$i]; ?>').style.display='block';
                            
                                      <?php
                                      }
              
                                 else
                                      { 
                                       ?>
                                      document.getElementById('<?php echo $s_id[$i]; ?>').style.display='none'; 
                     
                                      <?php  
                                      }
                                  
                                
                                
                                
             
                                }
                            
                        
                            ?>
                                
                            
                        }
                    
                   else
                   {
                      <?php  for($i=0;$i<$lim;$i++) 
                            {
                      ?>
                       document.getElementById('<?php echo $s_id[$i]; ?>').style.display='block';
                      <?php
                            }
                      ?>  
                   }
                    
                    
                    
                }
            
            
            
            
            
            
            
            
            </script>
    </div>
    </div>  
       <?php 
        if($_SESSION['upload_message']=='on')
        {
        ?>
        <div class="upload_message">
        
        <div class="head_message">
           If you are not able to find the question<br>
            Just upload it
        </div>
           <div class="search_text">
          <?php
               echo $_SESSION['search_q'];
           
        
               ?>
           </div>
       <a href="Questions.php?sq_text=<?php echo $_SESSION['search_q']; ?>"><button id="edit_upload" >
           Edit &amp; upload &#x2714; 
           </button></a>
        
       </div><?php }?>
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
     
    setsql($setsql);
      global  $i,$vqid;
      $i=0;
        jump:
       $data_set = getdata($conn);
       $i++;
       
       $vqid=  $data_set[$i][9];
    
    
    
    ?>
    
   
    <div class="qna_box">
    
        
           
        <a href="user.php?uid=<?php echo $data_set[$i][10] ?>"><p2 class="qna_name"><?php echo $data_set[$i][0]." ".$data_set[$i][1]; ?></p2></a>
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

      <a href="answers/<?php echo $data_set[$i][9]; ?>.php#submit" target="_blank"><button id="give">Give answer</button></a>
      <a href="answers/<?php echo $data_set[$i][9]; ?>.php" target="_blank"><button id="show">Show answers</button></a>
      
      
        
  </div>
       

        
         
    </div>
      
        <?php 
        if($i<$_SESSION['qna_count']-1)
        goto jump;
        
        
        // try some other algorithm , your website cannot rely on this algorithm....
        //bettr luck next time....
        ?>
    </div>
    
  


    </div> 

</body>    

</html> 
