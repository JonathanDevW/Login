<?php

include 'db/config.php';
include 'db/connection.php';

$user = $_POST['usuario'];
$pass = $_POST['password'];
$passconfirm = $_POST['passwordConfirm'];
$minPass = strlen($pass);

//verificar si el usuario no esta duplicado
$query = "SELECT usuario FROM usuario WHERE usuario = '$user';";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result); // output data of each row           
if ($row > 0) // Si $row_cnt es mayor de 0 es porque existe el registro
{
    header("Location: register-page.php?usuarioexistente=yes");
} else {
    if ($user != "" && $pass != "" && $passconfirm != "") {
        //   Not empty

        if ($minPass >= 6) {

            // equal
            if ($pass == $passconfirm) {

                //  ENCRYPTING PASSSWORD
                $hash = password_hash($pass, PASSWORD_DEFAULT);

                $query = "INSERT INTO"
                    . " usuario(usuario, password)"
                    . " values ('$user','$hash');";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    header("Location: register-page.php?usuarioregistrado=yes");
                }
            } else {
                header("location: register-page.php?diferentespasswords=yes");
            }
        } else {
            header("Location: register-page.php?minpassword");
        }
    } else {
        header("location: register-page.php?camposrequeridos=no");
    }
}



mysqli_close($conn);
