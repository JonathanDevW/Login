<?php

session_start();

//including the connection
include 'db/config.php';
include 'db/connection.php';

//inicializando variables

$user = $_POST['usuario'];
$pass = $_POST['password'];


if ($user != "" && $pass != "") {
    $query = "SELECT usuario, password FROM usuario WHERE usuario = '$user'";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc(); // output data of each row

    if ($result->num_rows == 1 && $user == $row['usuario'] && password_verify($pass, $row['password'])) {
        $_SESSION['usuario'] = $user;
        $_SESSION['authenticated'] = "yes";
        header("Location:page\index.php");
    } else {
        header("location:login-page.php?credencialesincorrectas=true");
    }
    if ($result->num_rows == 0) {
        header("location:login-page.php?sinexistencia=true");
    }
} else {
    header("location:login-page.php?camposrequeridos=true");
}

mysqli_close($conn);


// if ($user != "" && $pass != "") {
//     $query = "SELECT usuario, password FROM usuario WHERE usuario = '$user'";
//     $result = mysqli_query($conn, $query);
//     $row = $result->fetch_assoc(); // output data of each row
//     if (($result) == 0){
//         echo "CUENTA DE USUARIO NO EXISTENTE";
//     }else{
    
//         if ($result->num_rows == 1 && $user == $row['usuario'] && password_verify($pass, $row['password'])) {
//             $_SESSION["authenticated"] = "yes";
//             header("Location: C:\Apache24\htdocs\parcialLogin\register-login\page\index.php?usuario=$user");
//         } else {
//             $_SESSION['intentos'];
//             header("location:login-page.php?wrongcredentials=yes");
//         }
//     }
      
//     }else{
//         header("location:login-page.php?Allfieldsarerequired=true"); 
//     }


// mysqli_close($conn);

// 
