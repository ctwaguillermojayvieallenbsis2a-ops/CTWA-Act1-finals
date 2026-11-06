
<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        session_regenerate_id(true);
        $_SESSION['username'] = $user['username'];

        header("Location: home.php");
        exit();

    } else {
        echo "Wrong email or password!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Welcome Back!</h2>

    <form method="POST">

        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter email" required>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter password" required>

        <button type="submit" name="login">Login</button>

    </form>

    <p>Don't have an account?
        <a href="register.php">Register Here</a>
    </p>

</div>

</body>
</html>
