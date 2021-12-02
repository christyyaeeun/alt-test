<?php

// Replace $user and $pass with strong values for production
$host = 'localhost';
$db   = 'useraccount';
$user = 'root';
$pass = '';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db";
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


if (isset($_POST['user_register'])){
// Get form field values
    $username           = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $firstname          = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname           = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email              = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password           = filter_input(INPUT_POST, 'password');
    $pass_confirm       = filter_input(INPUT_POST, 'confirm-password');


// Check if passwords match
    if ($password !== $pass_confirm) {
        $errors[] = "Passwords don't match";
    }

    // Check if password is secure
    if (strlen($password) < 8) {
        $errors[] = "Password not long enough! Must be at least 8 characters long";
    }

    // Check if username equals password
    if ($firstname === $password) {
        $errors[] = "Your name cannot be your password!";
    }


// Check if email address exists in database
    $email_query = $pdo->prepare("SELECT count(1) FROM users WHERE email = :email");
    $email_query->bindParam(':email', $email);
    $email_query->execute();
    $email_found = $email_query->fetchColumn();
    if ($email_found) {
        $errors[] = "Your email address is associated with another account.";
    }



// If no errors, continue with user account creation
    if (!$errors)
    {   
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Create database entry
        $create_account = $pdo->prepare("INSERT INTO users (username, firstname, lastname, email,password) VALUES (:username, :firstname, :lastname, :email, :password)");
        $create_account->bindParam(':username', $username);
        $create_account->bindParam(':firstname', $firstname);
        $create_account->bindParam(':lastname', $lastname);
        $create_account->bindParam(':email', $email);
        $create_account->bindParam(':password', $hashed_password);
        $create_account->execute();

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: home.php');
        exit;
    }
}


// LOGIN USER
if (isset($_POST['user_login'])) {
    $username = filter_input($db, $_POST['username']);
    $password = filter_input($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

if (!$errors) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($useraccount, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}?>