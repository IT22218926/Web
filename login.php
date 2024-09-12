<!-- login.php -->
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $user = stripslashes($user);
    $pass = stripslashes($pass);
    $user = $conn->real_escape_string($user);
    $pass = $conn->real_escape_string($pass);

    $sql = "SELECT * FROM users WHERE username='$user' and password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user;
        header("Location: workorder.php");
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login Page</h2>
    <form method="post" action="login.php">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
            <p></p>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
            <p></p>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
</body>
</html>
