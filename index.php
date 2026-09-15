<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Hospital Login</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="background">

    <div class="login-card">

        <h1>
            Welcome Back
        </h1>

        <p>
            Login to your Hospital Account
        </p>

        <form action="app/controllers/AuthController.php" method="POST">

            <label>
                Email Address
            </label>

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required
            >

            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Enter password"
                required
            >

            <label>
                Select Role
            </label>

            <select name="role" required>

                <option value="admin">
                    Admin
                </option>

                <option value="doctor">
                    Doctor
                </option>

                <option value="patient">
                    Patient
                </option>

                <option value="staff">
                    Staff
                </option>

            </select>

            <button type="submit" name="login">
                Login
            </button>

            <p class="signup">

                Don't have an account?

                <a href="signup.php">
                    Sign Up
                </a>

            </p>

        </form>

    </div>

</div>

<script src="js/script.js"></script>

</body>

</html>