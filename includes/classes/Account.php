<?php
class Account
{
    private $errorArray;

    public function __construct()
    {
        $this->errorArray = array();
    }

    public function register($username, $firstname, $lastname, $email, $email2, $password, $password2)
    {
        $this->validateUsername($username);
        $this->validateFirstname($firstname);
        $this->validateLastname($lastname);
        $this->validateEmails($email, $email2);
        $this->validatePasswords($password, $password2);

        if (empty($this->errorArray)) {
            // Insert into db
            return true;
        } else {
            return false;
        }
    }

    private function validateUsername(str $username)
    {
        if (strlen($username) > 25 || strlen($username < 5)) {
            array_push($this->errorArray, "Your username must be between 5 and 25 characters");
            return;
        }

        //TODO: check if username exists
    }

    private function validateFirstname(str $firstname)
    {
        if (strlen($firstname) > 25 || strlen($firstname < 2)) {
            array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
            return;
        }
    }

    private function validateLastname(str $lastname)
    {
        if (strlen($lastname) > 25 || strlen($lastname < 2)) {
            array_push($this->errorArray, "Your last name must be between 2 and 25 characters");
            return;
        }
    }

    private function validateEmails(str $email, str $email2)
    {
        if ($email != $email2) {
            array_push($this->errorArray, "Your emails don't match");
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, "Email is invalid");
            return;
        }

        //TODO: check that email is not being used
    }

    private function validatePasswords(str $password, str $password2)
    {
        if ($password != $password2) {
            array_push($this->errorArray, "Your passwords don't match");
            return;
        }

        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, "Your passwords can only contain numbers and letters");
            return;
        }

        if (strlen($password) > 30 || strlen($password < 6)) {
            array_push($this->errorArray, "Your first name must be between 6 and 30 characters");
            return;
        }
    }
}
