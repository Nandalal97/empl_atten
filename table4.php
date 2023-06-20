
<?php include "header.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
table,td, th{
    border:1px solid black;
    border-collapse: collapse;
    font-size:16px;
    font-weight:300;
   
  } 

  .row{
    background-color:#fff;
    
    padding:20px;
    
  }

  .container{
    width: 80%;
    margin:0 auto;
    margin-top:20px;
  }
    </style>
</head>
<body>


<div class="container">
<?php
include ("dbconfig.php");
?>

<div class="row">
<form action="" method="post">
    <label for="">Choose Id:</label>
<select name="optionName" id="optionName">
    <option value="optionName">Select Id</option>
    <?php 
    $query ="SELECT distinct id FROM attendance";
   
    $result = mysqli_query($conn, $query);
    
    if($result->num_rows> 0){
        while($optionData=mysqli_fetch_assoc($result)){
        $option =$optionData['id'];
       
    ?>
    <option ><?php echo $option;?> </option>
    
   <?php
    }
}
    ?>

<?php
        if (isset($_POST['optionName']) && isset($_POST['optionName'])) {
          $Id = $_POST['optionName'];
          //echo $Id;
        } else {
          echo "Error:";
        }
?>

<?php
         if (isset($_POST['StartDate']) && isset($_POST['StartDate'])) {
          $st_date = $_POST['StartDate'];
          //echo $st_date;
         } else {
           echo "Error:";
         }
?>

<?php
        // if (isset($_POST['EndDate']) && isset($_POST['EndDate'])) {
        //   $en_date = $_POST['EndDate'];
        //   //echo $en_date;
        // } else {
        //   echo "Error:";
        // }
  ?>




</select>
<label for="">Select Date: </label>
<input type="date" name="StartDate"> to <input type="date" name="EndDate">
<input type="submit" onclick="dataInput()" name="submit">

</form>
<br>

<?php 
$firstDayofMonth = date("1-m-y");
$totalDaysInMonth= date("t", strtotime($firstDayofMonth));

$totalEmpl=5;

?>
<br>
<hr>
    
<table border="1" cellspacing="0" class="table-striped " id="emp-data">
                <thead >
                <?php 
                for($i=1; $i<=$totalEmpl; $i++){
                    if($i==1){
                    
                    echo "<tr>";
                    echo "<td>Id</td>";
                    echo "<td>Time</td>";
                    for($j=1; $j<=$totalDaysInMonth; $j++){
                        echo " <td>$j</td>";
                    }
                    echo "</tr>";
                    
                    }
                    }
                    
                ?>
                </thead>

    <?php
    include "dbconfig.php";
    $query="SELECT * FROM attendance where id=$Id";
    
//     $sql="SELECT Id, Name FROM emp_table";

//    $result = mysqli_query($conn, $sql);
//      foreach($result as $row) {
//          echo  $row['Id'];
        
//     }

     $row = mysqli_query($conn,$query);
  
    ?>
    <td><?php echo $Id ?></td>
    <td>Intime 
        <hr>
    Outtime</td>
    <?php
    while($data = mysqli_fetch_array($row)){
        
        ?>
        
                    <td><?=$data['time_in']?> 
                    <hr>
                    <?=$data['time_out']?></td>
                
                    
                    

        <?php
    }
    ?>
    </table>
   
<script>
    function dataInput(){
        var inputdata=document.getelementById("optionName").value;
       
        console.log(inputdata);
        if(inputdata==1){

        }
    }
</script>

<?php include "footer.php" ?>
</div>
</div>
</div>