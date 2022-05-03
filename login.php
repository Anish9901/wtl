<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <title>{% block title %}Auctions{% endblock %}</title> -->
    <title>Auctions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <h2>Login</h2>
    <hr>

    <!-- {% if message %}
        <div>{{ message }}</div>
    {% endif %} -->

    <form action="login.php" method="post">
        <!-- {% csrf_token %} -->
        <div class="form-label">
            <input autofocus class="form-control" type="text" name="username" placeholder="Username" required>
        </div>
        <div class="form-label">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>
        <input class="btn btn-primary" type="submit" value="Login">
    </form>

    Don't have an account? <a href="register.php">Register here.</a>

<!-- {% endblock %} -->
</body>
</html>

<?php

require 'connection.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT `id`, `username`, `email_id`, `password` FROM `users` WHERE `username` = '$user' AND `password` = 123456";
$result = mysqli_query($conn, $sql);
$mm;
while($row = mysqli_fetch_assoc($result))
{
    $mm = $row['email_id'];
    if(empty($row['username']) == FALSE)
    {
        echo 'Loged in as '.$row['username'];
    }
}

//echo $mm;
?>