<?php 
    
//session_start();
 //include 'b_connect.php';
/*function a_rowcount($sqlc)
{
    
    $result=$conn->query($sqlc);
    $row=$result->fetch_assoc();
    
    return $row;
  //  CloseCon($conn);
}*/

function a_setsql($sqlc)
{
    $GLOBALS['sql']=$sqlc;
    
}
   
function a_getdata($conn)
{ 
    $i=0;
    
 
    $result=$conn->query($GLOBALS['sql']);
    $row=0;
   do
    { 
       
     //   echo "working.<br>" ;
        
        
        $email=$row['a_uploader'];
        
         $linksql="select * from user_info.all_info where email='$email';";
         
        $linkresult=$conn->query($linksql);
        $linkrow=$linkresult->fetch_assoc();
        
        $_SESSION['tfname']= $linkrow['fname'];         //0
        $_SESSION['tlname']= $linkrow['lname'];         //1
        $_SESSION['ta_date_text']=$row['a_date_text'];  //2
        $_SESSION['ta_subject']=$row['a_subject'];      //3
        $_SESSION['ta_topic']=$row['a_topic'];          //4
        $_SESSION['ta_exam']=$row['a_exam'];            //5
        $_SESSION['ta_text']=$row['a_text'];            //6
        $_SESSION['ta_aid']=$row['a_qid'];              //7
        $_SESSION['ta_date']=$row['a_date'];            //8
        $_SESSION['taid']=$row['aid'];                  //9
        $_SESSION['ta_certify']=$row['a_certify'];      //10
        $_SESSION['ta_img']=$row['a_img'];              //11
        $_SESSION['ta_img_type']=$row['a_img_type'];    //12
        $_SESSION['cl_email']=$linkrow['email'];        //13
        $_SESSION['ta_code']=$row['a_code'];             //14
       $_SESSION['tq_text']=str_replace("\n","<br>",$_SESSION['tq_text']) ;
       $data_set[$i]=array($_SESSION['tfname'],$_SESSION['tlname'],$_SESSION['ta_date_text'],$_SESSION['ta_subject'],$_SESSION['ta_topic'],$_SESSION['ta_exam'],$_SESSION['ta_text'],$_SESSION['ta_aid'],$_SESSION['ta_date'],$_SESSION['taid'],$_SESSION['ta_certify'],$_SESSION['ta_img'],$_SESSION['ta_img_type'],$_SESSION['cl_email'],$_SESSION['ta_code']);
        $i++;
  //echo $_SESSION['q_date'];
   // echo $data_set[$i][5];
       
      
  
        
    }while($row=$result->fetch_assoc());

     return $data_set;
    }
   
    


    ?>


