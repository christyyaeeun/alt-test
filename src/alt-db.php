<?php

$user = 'root';
$pass = '';
$db = 'alt-app';
$db = new mysqli ('localhost', $user, $pass, $db) or die("u can't enter !");
echo"you're connected";

session_start();

//initializing variables
$username = "";
$email = "";

$error = array();

//connect to db
$db = mysqli_connect('localhost', 'root','', '');

//Register users
if (isset($POST['reg_user'])){
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password1 = mysqli_real_escape_string($db, $_POST['password1']);
$password2 = mysqli_real_escape_string($db, $_POST['password2']);

//form validation
if (empty($username)) {
    array_push($errors, "Username is required");
}
if (empty($email)) {
    array_push($errors, "Email is required");
}
if (empty($password1)) {
    array_push($errors, "Password is required");
}
if ($password1 != $password2) {
    array_push($errors, "Passwords do not match");
}

// check db for existing user with same username

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
        array_push($errors, "This email id already has a registered username");
    }
}
//Register the userif no error
if (count($errors) == 0) {
    $password = md5($password1); //encryption
    $query = "INSERT INTO user (username,email,password) VALUES ('$username', '$email', '$password')";

    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    header('location: home.php');
}

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($username)) {
        array_push($errors, "Username is required");
        if (empty($password)) {
            array_push($errors, "Pasword is required");
        }
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT FROM user WHERE username= '$username' AND password = '$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results)) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Logged in successfully";
                header('location: home.php');
            } else {
                array_push($errors, "Wrong username/password combination. Please try again.");
            }
        }
    }
}
}
?>