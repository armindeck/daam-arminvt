<?php

if($_POST["action"] == "login"){
    $username = secureString($_POST["username_ord_email"] ?? "");
    $password = secureString($_POST["password"] ?? "");

    if(login($username, $password, USERS)){
        redirect(DIR . "profile" . PHP_EXTENSION);
    } else {
        $_SESSION["form_data"] = $_POST;
        redirect(DIR . "login" . PHP_EXTENSION . "?ms=err&msm=credencialesinvalidas");
    }
}

if($_POST["action"] == "register"){
    $name = secureString($_POST["name"] ?? "");
    $username = secureString($_POST["username"] ?? "");
    $email = secureString($_POST["email"] ?? "");
    $password = secureString($_POST["password"] ?? "");
    $confirmPassword = secureString($_POST["confirm-password"] ?? "");

    if($password !== $confirmPassword){
        $_SESSION["form_data"] = $_POST;
        redirect(DIR . "register" . PHP_EXTENSION . "?ms=err&msm=lascontrasenasnodiciden");
    }

    if(register($username, $name, $email, $password, $confirmPassword, USERS)){
        redirect(DIR . "login" . PHP_EXTENSION . "?ms=exi&msm=registroexitoso");
    } else {
        $_SESSION["form_data"] = $_POST;
        redirect(DIR . "register" . PHP_EXTENSION . "?ms=err&msm=erroralregistrarusuario");
    }
}

if($_POST["action"] == "forgot-password"){
    $email = secureString($_POST["email"] ?? "");
    $recoveryPin = secureString($_POST["recovery_pin"] ?? "");

    $_SESSION["form_data"] = $_POST;
    redirect(DIR . "forgot-password" . PHP_EXTENSION . "?ms=err&msm=erroralrestablecercontrasena");
}