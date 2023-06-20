<?php include "header.php" ?>

<style>
    .help-block{
        font-size:14px;
        color:red
    }
</style>
<?php
if(isset($_POST["submit"]))
{

                $url='localhost';
                $username='root';
                $password='';
                $conn=mysqli_connect($url,$username,$password,"Empl_Atten");
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

// check duplicate entry 
$existSql= "select * from attendance where todays_date ='$todays_date'";
$result = mysqli_query($conn,$existSql);
$numExitRows=mysqli_num_rows($result);

// $noe ="select count(*) from attendance where todays_date ='$todays_date'";
// echo "$noe";


if ($numExitRows>=5){
    echo "<script>alert('duplicate entry.'); window.location.href='dashboard.php';</script>";

  }else{

    $sql = "INSERT INTO `attendance`(`id`, `todays_date`, `time_in`, `time_out`) VALUES ('$id','$todays_date','$time_in','$time_out')";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_execute($stmt);

     $c = $c + 1;
     }

      if($stmt){
        echo "<script>alert('Upload sucessfull'); window.location.href='dashboard.php';</script>";

       } 
   else
   {
    echo "<script>alert('Sorry! Unable to Upload'); window.location.href='dashboard.php';</script>";
      
    }
  }



}
?>
    <div class="container">
        <div class="row mt-md-5">
            <div class="col-md-8 col-sm-12 m-auto bg-light p-4 ">
            <div class="row">
            <div class="col-8 col-sm-4">
            <form enctype="multipart/form-data" method="post" role="form">
               
                    <label for="InputFile">File Upload</label> <br>
                    <input type="file" name="file" id="file" size="150">
                    <p class="help-block">*  Upload CSV File Only</p>
              
                </div>
                <div class="col-4 col-sm-8">
                <button type="submit" class="btn btn btn-primary mt-3" name="submit" value="submit">Upload</button>
              
                </div>
            </form>
            <hr>
            </div>

            <!-- table section -->
            
            <table class="table  table-striped " id="emp-data">
                <thead >

                    <tr >
                        <th>Id.</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>Date</th>
                        </tr>
                </thead>

<?php
    include "dbconfig.php";
    $query="SELECT * FROM attendance";
    $row = mysqli_query($conn,$query);

    while($data = mysqli_fetch_array($row)){
        ?>

                    <tr>

                    
                        <td><?=$data['id']?></td>
                        <td><?=$data['time_in']?></td>
                        <td><?=$data['time_out']?></td>
                        <td><?=$data['todays_date']?></td>

                    </tr>

        <?php
    }
    ?>
            </table>
            </div>
        </div>
    </div>

<?php include 'footer.php' ?>
