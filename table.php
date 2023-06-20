<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  /* table,td, th{
    border:1px solid black;
    border-collapse: collapse;
  } */
    </style>
</head>
<body>

<!-- <form>
    <label for="">Select Id</label>
    <select name="dropdown" id="">
        <option value="">Select</option>
        <option value="">D01</option>
        <option value="">D02</option>
        <option value="">D03</option>
        <option value="">D04</option>


    </select>
</form> -->

<?php
include ("dbconfig.php");
?>

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



</select>
<label for="">Select Date: </label>
<input type="date"> to <input type="date">
<input type="submit" onclick="dataInput()" name="submit">

</form>
<br>

<?php 
$firstDayofMonth = date("1-m-y");
$totalDaysInMonth= date("t", strtotime($firstDayofMonth));

$totalEmpl=5;

?>

    
<table border="1" cellspacing="0" class="table  table-striped " id="emp-data">
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




                    <!-- <tr>
                        <th>Id</th>
                        <th>Timing</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                        <th>19</th>
                        <th>20</th>
                        <th>21</th>
                        <th>22</th>
                        <th>23</th>
                        <th>24</th>
                        <th>25</th>
                        <th>26</th>
                        <th>27</th>
                        <th>28</th>
                        <th>29</th>
                        <th>30</th>
                        
                        </tr> -->

                </thead>

    <?php
    include "dbconfig.php";
    $query="SELECT * FROM attendance where id=1";
    
//     $sql="SELECT Id, Name FROM emp_table";

//    $result = mysqli_query($conn, $sql);
//      foreach($result as $row) {
//          echo  $row['Id'];
        
//     }

     $row = mysqli_query($conn,$query);
  
    ?>
    <td>1</td>
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

</body>
</html>