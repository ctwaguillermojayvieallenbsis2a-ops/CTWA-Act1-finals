
<?php
include "db.php";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registration successful!";
    } else {
        echo "Registration failed. Try another email.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Create Account</h2>

    <form method="POST">

        <label>Username:</label>
        <input type="text" name="username" placeholder="Enter username" required>

        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter email" required>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter password" required>

        <button type="submit" name="register">Register</button>

    </form>

    <p>Already have an account?
        <a href="login.php">Sign In</a>
    </p>

</div>

</body>
</html>
