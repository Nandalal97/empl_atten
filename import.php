<?php
if(isset($_POST["import"]))
{
    
                $url='localhost';
                $username='root';
                $password='';
                $conn=mysqli_connect($url,$username,$password,"empl_atten");
          if(!$conn){
          die('Could not Connect My Sql:' .mysqli_error());
		  }
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
           $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
          $id = $filesop[0];
          $todays_date=$filesop[1];
          $time_in= $filesop[2];
          $time_out= $filesop[3];
          

          $sql = "INSERT INTO `attendance`(`id`, `todays_date`, `time_in`, `time_out`) VALUES ('$id','$todays_date','$time_in','$time_out')";
          $stmt = mysqli_prepare($conn,$sql);
          mysqli_stmt_execute($stmt);

         $c = $c + 1;
           }

            if($sql){
               echo "sucess";
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }

}


?>




