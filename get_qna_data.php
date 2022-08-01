 <?php 
    
//session_start();

 //include 'b_connect.php';

global $qna_count;

function setsql($sqlc)
{
    $GLOBALS['sql']=$sqlc;
    
}
   
function getdata($conn)
{ 
    $i=0;
    
    
 
    $result=$conn->query($GLOBALS['sql']);
    $row=0;
   
   do
    { 
       
     //   echo "working.<br>" ;
        
        
        $email=$row['q_uploader'];
        
         $linksql="select * from user_info.all_info where email='$email';";
         
        $linkresult=$conn->query($linksql);
        $linkrow=$linkresult->fetch_assoc();
        
        $_SESSION['tfname']= $linkrow['fname'];         //0
        $_SESSION['tlname']= $linkrow['lname'];         //1
        $_SESSION['tq_date_text']=$row['q_date_text'];  //2
        $_SESSION['tq_subject']=$row['q_subject'];      //3
        $_SESSION['tq_topic']=$row['q_topic'];          //4
        $_SESSION['tq_exam']=$row['q_exam'];            //5
        $_SESSION['tq_text']=$row['q_text'];            //6
        $_SESSION['tq_aid']=$row['q_aid'];              //7
        $_SESSION['tq_date']=$row['q_date'];            //8
        $_SESSION['tqid']=$row['qid'];                  //9
        $_SESSION['cl_email']=$linkrow['email'];        //10
       $_SESSION['tq_text']=str_replace("\n","<br>",$_SESSION['tq_text']) ;
       $data_set[$i]=array($_SESSION['tfname'],$_SESSION['tlname'],$_SESSION['tq_date_text'],$_SESSION['tq_subject'],$_SESSION['tq_topic'],$_SESSION['tq_exam'],$_SESSION['tq_text'],$_SESSION['tq_aid'],$_SESSION['tq_date'],$_SESSION['tqid'],$_SESSION['cl_email']);
        $i++;
  //echo $_SESSION['q_date'];
   // echo $data_set[$i][5];
       
      
    $_SESSION['qna_count']=$i;
        
    }while($row=$result->fetch_assoc());
    
    
    
    
    
  
 $_SESSION['qna_count']=$i;
     return $data_set;
    }
    
    ?>


