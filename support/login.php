<?php
session_start();

if (isset($_POST['login'])) {
    if ($_POST['username'] == "admin") {
        if ($_POST['password'] == "admin") {
            $_SESSION['support'] = true;
            ?>
            <script>
                window.location.replace("." +
                 "");
            </script>
            <?php
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Support login</title>
</head>
<body>
<form method="post" action="login.php">
    <input type="text" name="username" placeholder="username">
    <br>
    <input type="password" name="password" placeholder="password">
    <br>
    <button type="submit" name="login">login</button>
</form>
</body>
</html>
