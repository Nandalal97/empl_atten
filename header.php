<?php 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:user/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome- <?php echo $_SESSION['email']?></title>



    <!-- CSS/bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/emp_details.css">
    <link rel="stylesheet" href="style.css">


    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>

    <header>

        <div class="logosec">
            <div class="logo">ABC Ltd.</div>
            <i class="fa-solid fa-bars menuicn"></i>
               
        </div>

        <div class="searchbar">
            <input type="text" placeholder="Search">
            <div class="searchbtn">
                <i class="fa-solid fa-magnifying-glass srch_icn"></i>
                    
            </div>
        </div>

        <div class="message">
            <div class="circle"></div>
           <i class="fa-solid fa-bell icon_notic"></i>
            <!-- <div class="user_dp" >
                <i class="fa-solid fa-user icon_user"></i>      
            </div> -->
            <?php echo $_SESSION['email']?> <br>
            <?php date_default_timezone_set("Asia/kolkata"); echo date("Y/m/d, h:i A"); ?>
        </div>

    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option ">
                        
                        <a href="dashboard.php"><i class="fa-solid fa-house icon"></i></a>
                        <h3><a href="dashboard.php">Dashboard</a></h3>
                    </div>

                    <div class="nav-option">
                        
                    <a href="report.php"><i class="fa fa-file-text icon" aria-hidden="true"></a></i>
                        <h3><a href="report.php">Report</a></h3>
                    </div>
                    <div class="nav-option">
                        <i class="fa-solid fa-users icon"></i>   
                        <h3>Profile</h3>
                    </div>
                    <div class="nav-option">
                        <i class="fa-solid fa-user icon"></i>   
                        <h3><a href="epm_detail.php">Add Empl.</a></h3>
                    </div>
                    <div class="nav-option">
                        <i class="fa-solid fa-gear icon"></i>  
                        <h3>Settings</h3>
                    </div>
                    <div class="nav-option">
                        <i class="fa-solid fa-right-from-bracket icon"></i> 
                        <h3> <a href="user/logout.php">Log Out</a> </h3>
                      
                    </div>
                    


                </div>
            </nav>
        </div>