<!-- {% extends "auctions/layout.html" %}

{% block body %} -->
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
    <h2>Register</h2>
    <hr>
    <!-- {% if message %}
        <div>{{ message }}</div>
    {% endif %} -->

    <!-- <form action="{% url 'register' %}" method="post"> -->
    <form action = "register.php" method="post">
        <!-- {% csrf_token %} -->
        <div class="form-label">
            <input class="form-control" autofocus type="text" name="username" placeholder="Username">
        </div>
        <div class="form-label">
            <input class="form-control" type="email" name="email" placeholder="Email Address">
        </div>
        <div class="form-label">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-label">
            <input class="form-control" type="password" name="confirmation" placeholder="Confirm Password">
        </div>
        <input class="btn btn-primary" type="submit" value="Register">
    </form>

    Already have an account? <a href="login.php">Log In here.</a>

<!-- {% endblock %} -->
</body>
</html>

<?php 
require 'connection.php';

//echo $database;
$usr = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_pass = $_POST['confirmation'];

$sql = "INSERT INTO `users`(`username`, `email_id`, `password`) VALUES ('$usr','$email','$password')";

if (mysqli_query($conn, $sql)) 
{
    header("Location: login.php");
    echo "New record created successfully";
}

else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
/* if($password == $confirm_pass && empty($_POST['password']) == FALSE)
{
    echo 'pass';
} */
?>