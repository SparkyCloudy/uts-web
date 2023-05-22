<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>

<form method="post" action="action/loginAction.php">
    <div class="mb-3">
        <label for="login_username_input">Username</label>
        <input id="login_username_input" type="text" name="username" required>
    </div>

    <div class="mb-3">
        <label for="login_password_input">Password</label>
        <input id="login_password_input" type="password" name="password" required>
    </div>

    <button type="submit" name="submit">Login</button>
</form>

<?php
//Terima query string lalu arahkan menuju tabelBarang.php bila user ditemukan
$message = $_GET['message'] ?? null;
if ($message == "success") {
    header("location: ../php_db/tabelBarang.php");
} elseif ($message == "failed") {
?>
<!--    Gunakan script tag untuk memberikan alert sederhana jika User/Password salah-->
    <script>
        alert("Username/Password salah");
        location.href = "loginApp.php";
    </script>
<?php
}
?>
</body>
</html>
