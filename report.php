
<?php include "header.php" ?>

<?php
error_reporting(0);
?>

<!doctype html>
<html lang="en">

<head>
  <title>Employee Management System</title>


  <style>
   

table,td, th{
    border:1px solid black;
    border-collapse: collapse;
    font-size:18px;
    font-weight:200;
    text-align:center;

   
  } 
  table{
    width: 100%;
  }
.main{
  width: 80%;
  height:550px;
  margin:0 auto;
  margin-top:20px;
  background-color:#fff;
  border-radius:5px;
} 
.row{
  margin-top:20px;
  padding:20px;
} 
  </style>
</head>

<body>
  
  
  <main class="main">
    <div class="row">
      <div class="col-sm-12">
        <form action="" method="post" class="table-col ">

        <h5 class='text-center'>Select Emp. Id and to days in between you are searching the attendence Report </h5>
        <hr>
        <div class="text-center">
          

        <label for="Id" >Choose Id:</label>
          <select name="Id" id="Id" class="select">
            <!-- <option value="Id">ID</option> -->
            <option value="optionName">Select Id</option>
            <?php
            include "dbconfig.php";


            $sql = "SELECT Id FROM emp_table";

            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
              while ($optionData = $result->fetch_assoc()) {
             
            
                ?>
                <option name="Id">
                  <?php echo $optionData['Id']; ?>
                </option>
                <?php
              }
            }
            ?>

          </select>
          <label for="" >Select Date: </label>
          <input type="date" id="StartDate" class="datepicker setNext hasDatepicker" name="StartDate"> to
          <input type="date" id="EndDate" class="datepicker hasDatepicker" name="EndDate" >
          <input type="submit" value="Submit" onclick="abc()" class="submit">
        </form>


        <?php
        $passMass="";
        if (isset($_POST['Id']) && isset($_POST['Id'])) {
          $Id = $_POST['Id'];
          //echo $Id;
        } else {
          echo "Select Id and";
        }
        ?>



        <?php
        if (isset($_POST['StartDate']) && isset($_POST['StartDate'])) {
          $st_date = $_POST['StartDate'];
          //echo $st_date;
        } else {
           echo "Date";
        }
        ?>

        <?php
        if (isset($_POST['EndDate']) && isset($_POST['EndDate'])) {
          $en_date = $_POST['EndDate'];
          //echo $en_date;
        } else {
          // echo "Error:";
        }
        ?>


        </div>

<hr>



        <table cellspacing="0" cellpadding="0" class="table_data" id="emp-data" border="">
          <thead>

            <tr>
              <th>ID</th>
              <th>Timing</th>
              <?php
              include "dbconfig.php";

              $queryX = "SELECT DATE_FORMAT(todays_date,'%d') as 'todays_date' from attendance where Id=$Id and todays_date  between '$st_date' and '$en_date'";
              $row = mysqli_query($conn, $queryX);
              ?>

              <?php
              while ($data = mysqli_fetch_array($row)) {
                ?>

                <th style="font-size:14px;">
                  <?= $data["todays_date"] ?>
                </th>

                <?php
              }
             

              ?>
            </tr>

          </thead>

          <?php
          include "dbconfig.php";
          $query = "SELECT * FROM attendance where Id=$Id and todays_date between '$st_date' and '$en_date'";

          $row = mysqli_query($conn, $query);

         
          ?>
          <td style="font-weight:300;font-size:20px;">
            <?php echo $Id; ?>
          </td>
          <td>Intime
            <hr>
            Outtime
          </td>
          <?php
          while ($data = mysqli_fetch_array($row)) {
            ?>


            <td style="font-size:14px; text-align: center;" class="tdData">
              <?= $data['time_in'] ?>
              <hr>
              <?= $data['time_out'] ?>
            </td>




            <?php
          }
          ?>
        </table>

      </div>
    </div>



    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-4">
        <?php
        include "dbconfig.php";
        $queryA = "SELECT count(time_in) as 'lateTime' from attendance WHERE time_in > 10.30 and todays_date  between '$st_date' and '$en_date' AND id = $Id";

        $row = mysqli_query($conn, $queryA);
        ?>
        <?php
        while ($data = mysqli_fetch_array($row)) {
          ?>
          <h3>
            <?php echo "Actaul late days :&nbsp;" . $data['lateTime'] ?>
            <?php $phpvar = $data['lateTime']; ?>
          </h3>
          <?php
        }
        ?>



        <?php
        include "dbconfig.php";
        $queryA = "SELECT count(time_in) as 'lateTime' from attendance WHERE time_in = 0 and WEEKDAY(todays_date)<>6 and todays_date  between '$st_date' and '$en_date' AND id = $Id";
        
        $row = mysqli_query($conn, $queryA);
        ?>
        <?php
        while ($data = mysqli_fetch_array($row)) {
          ?>
          <h3>
            <?php echo "Actual absent days :&nbsp;" . $data['lateTime'] ?>
            <?php $phpvar2 = $data['lateTime']; ?>
          </h3>
          <?php
        }
        ?>
        <h3 style="display: flex;" id="">Total absent including late present:&nbsp;<p id="include_latedays"></p></h3>
      </div>
      <div class="col-sm-4">
        <p id="biplab_chagol"></p>
      </div>
    </div>




  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  

  <script>
    const phpecho= "<?php echo $phpvar; ?>";
    const phpecho2= "<?php echo $phpvar2; ?>";
    const result = Number(Math.floor(phpecho / 3));
    
    document.getElementById("include_latedays").innerHTML = result + Number(phpecho2);
  </script>
</body>
</html>