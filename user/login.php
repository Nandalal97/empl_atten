<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Log In</title>
    <link rel="stylesheet" href="../css/bootstrap.css" />

    <style>
      .login_from .form-control {
        box-shadow: none;
      }
      .login_from .error{
			color:red;
		}
    </style>
  </head>

  <body>
		<?php 
    $passErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include '../dbconfig.php';
  $email=$_POST['email_id'];
  $password=$_POST['pass'];

  $sql = "select * from  user where email='$email'";
  $result = mysqli_query($conn, $sql);
  $numRow=mysqli_num_rows($result);

  if($numRow==1){
    while($row=mysqli_fetch_assoc($result)){

      if(password_verify($password, $row['pass'])){
        
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['email']=$email;
        header("location:../dashboard.php");

      }
      else{
        $passErr ="Password is wrong";

      }
    }
    
  }
  else{
    echo "<script>alert('Invalide Credantials');</script>";

  }
}
    
    ?>





    <section class="h-100">
      <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
          <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="card shadow-lg mt-5">
              <div class="card-body p-3">
                <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                <form method="POST" action="" class="needs-validation login_from" novalidate="" autocomplete="off">
                  <div class="mb-3">
                    <!-- <label class="mb-2 text-muted" for="email">E-Mail Address</label> -->
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                      <input id="email" type="email" class="form-control" name="email_id" value="" placeholder="Your Email" required autofocus/>
                    </div>
                    <div class="invalid-feedback">Email is invalid</div>
									</div>

                  <div class="mb-3">
                    <div class="mb-2 w-100">
                      <!-- <label class="text-muted" for="password">Password</label> -->
                      <a href="forgot.html" class="float-end">Forgot Password?</a>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                      <input id="password" type="password" class="form-control" name="pass" placeholder="Password" required/>
                    </div>
                  
                    <span class="error"> <?php echo $passErr;?></span>
                  </div>

                  <div class="d-flex align-items-center">
                    <div class="form-check">
                      <input type="checkbox" name="remember" id="remember" class="form-check-input"/>
                      <label for="remember" class="form-check-label">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary ms-auto">
                      Login
                    </button>
                  </div>
                </form>
              </div>
              <div class="card-footer py-3 border-0">
                <div class="text-center">
                  Don't have an account?
                  <a href="../user/signup.php" class="text-dark">Sign Up</a>
                </div>
              </div>
            </div>
            <div class="text-center mt-5 text-muted">
            Copyright &copy; <?php echo date('Y'); ?> ABC Ltd. 
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="js/login.js"></script>
  </body>
</html>
