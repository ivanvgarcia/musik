<?php
function sanitizeFormPassword($password)
{
    $password = strip_tags($password);
    return $password;
}

function sanitizeFormUsername($username)
{
    $username = strip_tags($username);
    $username = str_replace(" ", "", $username);
    return $username;
}

function sanitizeFormInput($field)
{
    $field = strip_tags($field);
    $field = str_replace(" ", "", $field);
    $field = ucfirst(strtolower($field));
    return $field;
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

    $successfullyRegistered = $account->register($username, $firstname, $lastname, $email, $email2, $password, $password2);

    if ($successfullyRegistered) {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}
