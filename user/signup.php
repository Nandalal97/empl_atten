<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	
	<title>sign Up</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
	
  <style>
    .signup_from .form-control{
        box-shadow: none;

		}
		.signup_from .error{
			color:red;
		}
		
	
  </style>
</head>

<body>

<!-- Database configaration  for sign up -->

<?php 
	$nameErr="";
	$emailErr="";
	$passErr="";
	$cpassErr="";
	$existEmail="";
	$signSuccess="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include '../dbconfig.php';
	$name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];


	$existSql= "select * from user where email='$email'";
  $result = mysqli_query($conn,$existSql);
  $numExitRows=mysqli_num_rows($result);
	if (empty($name)) {
    $nameErr = "* Name is required";
     
  }
  else if (empty($email)) {
    $emailErr = "* Email is required";
     
  }
  else if (empty($password)) {
    $passErr = "* Password is required";
    
  }
  else{

		if ($numExitRows>0){
			$existEmail="Email alredy Exists";
			
	
		}
		else{
		
			if($password == $cpassword){
				$hash=password_hash($password,PASSWORD_DEFAULT);
				$sql = "insert into user (name, email, pass, date_time) values ('$name', '$email','$hash',  current_timestamp())";
				$result = mysqli_query($conn,$sql);
				if($result){
				
				 echo "<script>alert('Successfull Sign Up.'); window.location.href='../user/login.php';</script>";
				}
			}
			else {
				$cpassErr = "Password dose not match";
			}
		}
	}	
}
?>

<!--  Database confiration end for sign up  -->
	
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="card shadow-lg mt-5">
						<div class="card-body p-3">
							<h1 class="fs-4 card-title fw-bold mb-4">Sign Up</h1>
							<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="needs-validation signup_from" novalidate="" autocomplete="off">
								<div class="mb-3">
									<!-- <label class="mb-2 text-muted" for="name">Name</label> -->
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
										<input id="name" type="text" class="form-control " name="name" value="" placeholder="Full Name" required autofocus>
									</div>
									<span class="error"> <?php echo $nameErr;?></span>
								</div>

								<div class="mb-3">
									<!-- <label class="mb-2 text-muted" for="email">E-Mail Address</label> -->
									<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
										<input id="email" type="email" class="form-control" name="email" value="" placeholder="Your Email" required>
									</div>
									<span class="error"> <?php echo $emailErr;?></span>
									<span class="error"> <?php echo $existEmail;?></span>
								</div>

								<div class="mb-3">
									<!-- <label class="mb-2 text-muted" for="password">Password</label> -->
									<div class="input-group">
										<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
										<input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
									</div>
									<span class="error"> <?php echo $passErr;?></span>
								</div>
								<div class="mb-3">
									<!-- <label class="mb-2 text-muted" for="cpassword">Confirm Password</label> -->
									<div class="input-group">
									<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
										<input id="cpassword" type="cpassword" class="form-control" name="cpassword" placeholder="Confirm Password " required>
									</div>
									<span class="error"> <?php echo $cpassErr;?></span>
								</div>

								<p class="form-text text-muted mb-3">
									By registering you agree with our terms and condition.
								</p>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">Sign Up	</button>
								</div>
								
						
								
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="../user/login.php" class="text-dark">Login</a>
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
	

	
</body>
</html>
