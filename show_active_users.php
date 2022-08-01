<?php 

$pair_color_pack=array(
                 array( '#000000FF','#FFFFFFFF'),
                 array( '#00203FFF','#ADEFD1FF'),
                 array( '#606060FF','#D6ED17FF'),
                 array( '#00539CFF','#EEA47FFF'),
                 array( '#101820FF','#FEE715FF'),
                 array( '#2BAE66FF','#FCF6F5FF'),
                 array( '#FAEBEFFF','#333D79FF'),
                 array( '#F2EDD7FF','#755139FF'),
                 array( '#FFD662FF','#00539CFF'),
                 array( '#FCF951FF','#422057FF')
                 
                 );

$_SESSION['pair_color_pack']=$pair_color_pack;


$sql="select * from user_info.all_info;";

$result=$conn->query($sql);
$row=0;

$i=0;

do{
    
    $_SESSION['cl_fname']=$row['fname'];           //0
    $_SESSION['cl_lname']=$row['lname'];           //1
    $_SESSION['cl_email']=$row['email'];           //2
    $_SESSION['color_pick_num']=rand(1,5);        //3
    $_SESSION['uid']=$row['uid'];                  //4
    
    
    $user_data_set[$i]=array($_SESSION['cl_fname'],$_SESSION['cl_lname'],$_SESSION['cl_email'],$_SESSION['color_pick_num'],$_SESSION['uid']);
    $i++;
}while($row=$result->fetch_assoc());
$_SESSION['user_count']=$i;
$_SESSION['user_data_set']=$user_data_set;



?>