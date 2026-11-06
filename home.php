
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Welcome!</h1>

    <h2>
        Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!
    </h2>

    <p>You have successfully logged in.</p>

    <a href="logout.php">
        <button>Logout</button>
    </a>

</div>

</body>
</html>

