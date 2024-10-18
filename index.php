<!-- <?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: views/machine/public/index.html");  // Redirect to React app if already logged in
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password (you can add your own validation here)
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['user'] = $username;
        header("Location: views/machine/public/index.html"); // Redirect to React app on success
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form action="" method="POST">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html> -->