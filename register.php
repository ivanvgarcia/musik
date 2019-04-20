<?php

 function sanitizeFormPassword(str $password) {
    $password = strip_tags($password);
    return $password;
 }

 function sanitizeFormUsername(str $username) {
    $username = strip_tags($username);
    $username = str_replace(" ", "", $username);
    return $username;
 }

 function sanitizeFormInput(str $field) {
    $field = strip_tags($field);
    $field = str_replace(" ", "", $field);
    $field = ucfirst(strtolower($field));
    return $field;
 }

 if (isset($_POST['loginButton'])) {
   // Login Button was Pressed
 }

 if (isset($_POST['registerButton'])) {
    // Sanitize all user input
    $username = sanitizeFormUsername($_POST['username']);
    $firstname = sanitizeFormInput($_POST['firstname']);
    $lastname = sanitizeFormInput($_POST['lastname']);
    $email = sanitizeFormInput($_POST['email']);
    $email2 = sanitizeFormInput($_POST['email2']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register to Musik</title>
</head>

<body>
    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your account</h2>

            <div>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="bartSimpson" required>
            </div>
            <div>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" name="loginPassword" type="password" required>
            </div>
            <button type="submit" name="loginButton">Login</button>
        </form>

        <form id="registerForm" action="register.php" method="POST">
            <h2>Create your free account</h2>

            <div>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="bartSimpson" required>
            </div>
            <div>
                <label for="firstName">First Name</label>
                <input id="firstName" name="firstName" type="text" placeholder="Bart" required>
            </div>
            <div>
                <label for="lastName">Last Name</label>
                <input id="lastName" name="lastName" type="text" placeholder="Simpson" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="bart@gmail.com" required>
            </div>
            <div>
                <label for="email2">Confirm Email</label>
                <input id="email2" name="email2" type="text" placeholder="bartSimpson" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
            </div>
            <div>
                <label for="password2">Confirm Password</label>
                <input id="password2" name="password2" type="password" required>
            </div>
            <button type="submit" name="registerButton">Sign Up</button>
        </form>
    </div>
</body>

</html>