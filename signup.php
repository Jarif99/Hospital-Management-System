<!DOCTYPE html>
<html>

<head>

<title>User Registration</title>

<link rel="stylesheet" href="css/style.css">

</head>


<body>


<div class="background">


<div class="login-card signup-card">


<h1>
Create Your Account
</h1>


<p>
Join the Hospital Management System
</p>



<form action="app/controllers/AuthController.php" method="POST">


<label>Register as</label>


<div class="role-box">


<label>
<input type="radio" name="role" value="doctor" required>
Doctor
</label>


<label>
<input type="radio" name="role" value="patient">
Patient
</label>


<label>
<input type="radio" name="role" value="staff">
Staff
</label>


</div>



<input 
type="text"
name="full_name"
placeholder="Enter your full name"
required>



<input 
type="email"
name="email"
placeholder="Enter Email"
required>



<div class="password-box">


<input 
type="password"
name="password"
id="password"
placeholder="Create a password"
required>


<span onclick="showPassword()">
👁
</span>


</div>




<div class="password-box">


<input 
type="password"
name="confirm_password"
placeholder="Confirm password"
required>


</div>



<div class="terms">


<input type="checkbox" required>

I agree to the Terms & Conditions


</div>



<button type="submit" name="register" value="1">

Create Account

</button>



<p class="signup">

Already have an account?

<a href="index.php">
Sign In
</a>


</p>



</form>


</div>


</div>



<script src="js/script.js"></script>


</body>


</html>