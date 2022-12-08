<!doctype HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<?php
include ('includes/nav.html') 
?>
<div class="container" id ="login-form">
    
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
              <p class="text-white-50 mb-5">Please enter your details</p>

              <div class="form-outline form-white mb-4">
                <form action="create_record.php" method="post">
                <input type="firstName" name="user_firstname" value="<?php if (isset($_POST['user_firstname'])) echo $_POST['user_firstname']; ?>" id="typeFirstNameX" class="form-control form-control-lg">
                <label class="form-label" for="typeFirstNameX">First name</label>
              </div>

              <div class="form-outline form-white mb-4">
                <form action="create_record.php" method="post">
                <input type="lastName" name="user_lastname" value="<?php if (isset($_POST['user_lastname'])) echo $_POST['user_lastname']; ?>" id="typeLastNameX" class="form-control form-control-lg" />
                <label class="form-label" for="typelastNameX">Last name</label>
              </div>

              <div class="form-outline form-white mb-4">                
                <form action="create_record.php" method="post">
                <input type="email" name="user_email" value="<?php if (isset($_POST['user_email'])) echo $_POST['email']; ?>" id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <form action="create_record.php" method="post">
                <input type="password" name="user_password" value="<?php if (isset($_POST['user_password'])) echo $_POST['user_password']; ?>" id="typePasswordX" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>
			          <div class="form-outline form-white mb-4">
                <input type="password" name="user_password2" value="<?php if (isset($_POST['user_password2'])) echo $_POST['user_password2'];?>" id="typePassword2X" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Confirm Password</label>
              </div>     

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Sign Up</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Already a user? <a href="login-form.php" class="text-white-50 fw-bold">Log In</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <form action="create_record.php" method="post">
ID: <input type="text" name="user_id" class="form-control"  
value="<?php if (isset($_POST['user_id'])) echo $_POST['user_id']; ?>"> -->

<!-- <form action="create_record.php" method="post">
First Name: <input type="text" name="user_firstname" class="form-control"  
value="<?php if (isset($_POST['user_firstname'])) echo $_POST['user_firstname']; ?>">

<form action="create_record.php" method="post">
Last Name: <input type="text" name="user_lastname" class="form-control"  
value="<?php if (isset($_POST['user_lastname'])) echo $_POST['user_lastname']; ?>"> <br>

<form action="create_record.php" method="post">
email: <input type="text" name="user_email" class="form-control"  
value="<?php if (isset($_POST['user_email'])) echo $_POST['user_email']; ?>"> <br>

<form action="create_record.php" method="post">
password: <input type="text" name="user_password" class="form-control"  
value="<?php if (isset($_POST['user_password'])) echo $_POST['user_password']; ?>"> <br>
<input type="submit">
</div>
<footer>
<a href="read_table.php">Read table</a> 
<a href="update_record.php">Update record</a>
<a href="delete_record.php">Delete record</a>
</footer> -->

</body>
</html>