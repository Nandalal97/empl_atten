<?php include "header.php" ?>

<?php 

$idErr="";
$nameErr="";
$addErr="";
$phoneErr="";
$emailErr="";
$salaryErr="";
$hqErr="";
$desigErr="";
$dobErr="";
$jontErr="";
$genderErr="";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
  include 'dbconfig.php';

  $emp_id=$_POST['emp_id'];
  $name=$_POST['name'];
  $address=$_POST['add'];
  $phone=$_POST['phone'];
  $email_id=$_POST['email_id'];
  $salary=$_POST['salary'];
  $hq=$_POST['hq'];
  $desig=$_POST['desig'];
  $dob=$_POST['dob'];
  $joint_date=$_POST['joint_date'];
  $gender=$_POST['gender'];


	$existSql= "select * from emp_table where Id='$emp_id'";
  $result=mysqli_query($conn, $existSql);
  $numExitRows=mysqli_num_rows($result);

  if(empty($emp_id)){
    $idErr = "* Id is required";
  }
  else if(empty($name)){
    $nameErr = "* Name is required";
  }
  else if(empty($address)){
    $addErr = "* Address is required";
  }
  else if(empty($phone)){
    $phoneErr = "* Phone Number is required";
  }
  else if(empty( $email_id)){
    $emailErr= "* Email Id is required";
  }
  else if(empty($salary)){
    $salaryErr= "* Salary is required";
  }
  else if(empty($hq)){
    $hqErr= "* Qualification is required";
  }
  else if(empty($desig)){
    $desigErr= "* Designation is required";
  }
  else if(empty($dob)){
    $dobErr= "* Date Of Birth is required";
  }
  else if(empty( $joint_date)){
    $jontErr= "* Joining date is required";
  }
  else if(empty( $gender)){
    $genderErr= "* Gender is required";
  }

  else{

    
  if($numExitRows>0){
    echo "<script> alert('Emp_Id alredy Exists')</script>";
  }
 
  else{
    $sql="INSERT INTO `emp_table`(`Id`, `Name`, `Address`, `Phone_no`, `Emailid`, `Salary`, `Designation`, `hq`, `dob`, `Joining_Date`, `gender`) VALUES ('$emp_id','$name','$address','$phone','$email_id','$salary','$desig','$hq','$dob',' $joint_date','$gender')";

    $run=mysqli_query($conn, $sql);
    if($run==true){
      echo "<script> alert('Done')</script>";
    }
    else{
      echo "<script> alert('Error')</script>";
    }

  }

  }
       
    }

?>







<style>
  .error {
    color: red;
  }
</style>



<div class="form_details">
<form action="" method="post">
    <div class="title">Employee Details</div>

      <div class="content">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Emp. Id</span>
            <input type="text" name="emp_id" placeholder="Ex. D0025" >
            <span class="error"> <?php echo $idErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name='name' placeholder="Ex. James Oliver" >
            <span class="error"> <?php echo $nameErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name='add' placeholder="Ex. 145/G, Kolkata , 700009" >
            <span class="error"> <?php echo $addErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Phone No.</span>
            <input type="text" name='phone' placeholder="Ex.9852536589" maxlength="10" minlength="10" >
            <span class="error"> <?php echo $phoneErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Email Id.</span>
            <input type="text" name='email_id' placeholder="Ex. Example@gmail.com" >
            <span class="error"> <?php echo $emailErr;?></span>
        
          </div>
          <div class="input-box">
            <span class="details">Salary</span>
            <input type="text" name='salary' placeholder="Ex.30,000/-" >
            <span class="error"> <?php echo $salaryErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Highest qualif.</span>
            <input type="text" name='hq' placeholder="Ex. B.Com, B.Tech.">
            <span class="error"> <?php echo $hqErr;?></span>
            
          </div>
          <div class="input-box">
            <span class="details">Designation</span>
            <input type="text" name='desig' placeholder="Ex. Accountant, Manager etc." >
            <span class="error"> <?php echo $desigErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">DOB</span>
            <input type="date" name='dob' placeholder="Ex. Accountant, Manager etc." >
            <span class="error"> <?php echo $dobErr;?></span>
            <span class="error"> <?php echo  $jontErr;?></span>
          </div>
          <div class="input-box">
            <span class="details">Joining Date</span>
            <input type="date" name='joint_date' placeholder="Ex. Accountant, Manager etc." >
            <span class="error"> <?php echo  $jontErr;?></span>
           
          </div>

          <div class="gender_details">
            <span>Gender:</span> 
            <select name="gender" id="">
            <option value="">select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Other</option>
            <!-- <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="others">Others -->
            </select>
            <span class="error"> <?php echo $genderErr;?></span>
          </div>
           
        </div>
      </div>
        
        <div class="button">
          <input type="submit" value="Submit">
        </div>

  </form>
</div>


<?php include "footer.php" ?>