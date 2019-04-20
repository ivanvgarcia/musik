<?php
include "includes/config.php";
include "includes/classes/Constants.php";
include "includes/classes/Account.php";

$account = new Account($con);

include "includes/handlers/register-handler.php";
include "includes/handlers/login-handler.php";

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
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
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="bsimp" required>
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
                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="bsimp"
                    value="<?php getInputValue('username')?>" required>
            </div>
            <div>
                <?php echo $account->getError(Constants::$firstnameCharacters); ?>
                <label for=" firstName">First Name</label>
                <input id="firstName" name="firstname" type="text" placeholder="Bart"
                    value="<?php getInputValue('firstname')?>" required>
            </div>
            <div>
                <?php echo $account->getError(Constants::$lastnameCharacters); ?>
                <label for="lastName">Last Name</label>
                <input id="lastName" name="lastname" type="text" placeholder="Simpson"
                    value="<?php getInputValue('lastname')?>" required>
            </div>
            <div>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$emailIsInvalid); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="bart@gmail.com"
                    value="<?php getInputValue('email')?>" required>
            </div>
            <div>
                <label for="email2">Confirm Email</label>
                <input id="email2" name="email2" type="text" placeholder="bartSimpson"
                    value="<?php getInputValue('email2')?>" required>
            </div>
            <div>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
                <?php echo $account->getError(Constants::$passwordCharacters); ?>
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