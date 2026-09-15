<?php

require_once "../config/database.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");

    if ($email === "") {

        $message = "Email is required.";

    } else {

        $database = new Database();
        $conn = $database->connect();

        $stmt = $conn->prepare(
            "SELECT id FROM users WHERE email = ? LIMIT 1"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $stmt->close();
            ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>

                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title>Reset Password</title>

                <style>

                    body {
                        margin: 0;
                        padding: 0;
                        font-family: Arial, sans-serif;
                        background: #f1f5f9;
                        height: 100vh;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                    .container {
                        width: 380px;
                        background: white;
                        padding: 35px;
                        border-radius: 15px;
                        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
                        text-align: center;
                    }

                    h2 {
                        color: #1e293b;
                        margin-bottom: 25px;
                    }

                    input {
                        width: 90%;
                        padding: 12px;
                        margin: 10px;
                        border: 1px solid #cbd5e1;
                        border-radius: 8px;
                        font-size: 15px;
                        box-sizing: border-box;
                    }

                    button {
                        width: 95%;
                        padding: 12px;
                        margin-top: 15px;
                        border: none;
                        border-radius: 8px;
                        background: #0ea5e9;
                        color: white;
                        font-size: 16px;
                        cursor: pointer;
                    }

                    button:hover {
                        background: #0284c7;
                    }

                    a {
                        text-decoration: none;
                        color: #0ea5e9;
                    }

                    .logo {
                        font-size: 45px;
                        color: #0ea5e9;
                    }

                </style>

            </head>

            <body>

                <div class="container">

                    <div class="logo">
                        🏥
                    </div>

                    <h2>Reset Password</h2>

                    <form action="reset_password.php" method="POST">

                        <input
                            type="hidden"
                            name="email"
                            value="<?= htmlspecialchars($email); ?>"
                        >

                        <input
                            type="password"
                            name="password"
                            placeholder="Enter New Password"
                            minlength="6"
                            required
                        >

                        <input
                            type="password"
                            name="confirm_password"
                            placeholder="Confirm Password"
                            minlength="6"
                            required
                        >

                        <button type="submit">
                            Update Password
                        </button>

                    </form>

                    <br>

                    <a href="../index.php">
                        Back To Login
                    </a>

                </div>

            </body>

            </html>

            <?php
            exit();

        } else {

            $stmt->close();
            $message = "Email not found.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            background: white;
            width: 350px;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,.15);
            text-align: center;
        }

        h2 {
            color: #1e293b;
        }

        input {
            width: 90%;
            padding: 12px;
            margin: 15px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 95%;
            padding: 12px;
            background: #0ea5e9;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0284c7;
        }

        .error {
            color: red;
        }

        a {
            color: #0ea5e9;
            text-decoration: none;
        }

    </style>

</head>

<body>

    <div class="box">

        <h2>
            🏥 Forgot Password
        </h2>

        <form method="POST">

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required
            >

            <button type="submit">
                Continue
            </button>

        </form>

        <?php if ($message !== ""): ?>

            <p class="error">
                <?= htmlspecialchars($message); ?>
            </p>

        <?php endif; ?>

        <br>

        <a href="../index.php">
            Back to Login
        </a>

    </div>

</body>

</html>