<?php
session_start();

include 'b_connect.php';

$_SESSION['forward_file']=basename($_SERVER['PHP_SELF']);

if(isset($_GET['sq_text']))
{
  $_SESSION['forward_file']=$_SESSION['forward_file']."?sq_text=".$_GET['sq_text'];
    
}

$_SESSION['cur_file']=basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION['logged_in']))
{
    $_SESSION['sign_up']=true;
    header('location:explore.php');
    
}
?>


<!doctype html>
<html>
    <head>
        
          <link rel = "icon" href="icon.png" type="image/x-icon">
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type your Question , get answer within few minutes</title>
    <link rel="stylesheet" type="text/css" href="d_question.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    
    
        
    
    
    </head>

<body>
    


    <a href="home.php"><p1 title="Doubtcool"> <i class="fa fa-home"></i> Doubtcool</p1></a>
    <div class="page_content">
    <p id="heading">Upload your Question</p>
    <p id="tag_line">Get answers within few minutes</p>
    
<div class="topic_line">
    
   <?php echo $_SESSION['exam']." | ".$_SESSION['subject']." | ".$_SESSION['topic']; ?>
    
    <button  id="select_topic" onclick="drop_filter()"><i class="fa fa-filter"></i> select topic</button>
    
</div>
 
    

<div id="parent_filter" style="display:none;">
    <div class="fil_container">
        
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
        
        
        <form method="post" action="apply_filter.php
                                    ">
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
        <select id="subject_col"name="subject"  onChange="fil_by_subject(this.value);" >
        
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
        
        if(isset($_GET['sq_text']))
        {
            $_SESSION['squ_text']=$_GET['sq_text'];
            
            
        }
        else
        {
            
            $_SESSION['squ_text']="";
        }
        ?>
    
<div class="text_box"  style="display:block;">
<form method="post" action="b_upload_question.php">
    <textarea wrap="hard" id="text_place" placeholder="Start typing here... ALERT before typing your please select topic " name="q_text">
    <?php echo $_SESSION['squ_text']; ?></textarea>  

    <br>
    <br>
    <button id="submit" type=submit>Submit</button>
</form>
    
</div>
    
    
</div>
   
    
    
</body>


</html>