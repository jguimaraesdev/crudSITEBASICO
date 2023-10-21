<!DOCTYPE html>

<html lang="pt-br">
<meta charset="UTF-8"/>
<?php
require_once 'login.php';

if (!isset($_SESSION["conectado"]) || ($_SESSION["conectado"] <> '1')) {


    $login = new login();

    if (isset($_POST["tMail"]) && (isset($_POST["tSenha"]))) {
        try {
            $conectado = $login->autentica($_POST["tMail"], $_POST["tSenha"]);
            if ($conectado) {
                $_SESSION["conectado"] = '1';
                $_SESSION["email"] = $_POST["tMail"];
            } else {
                $_SESSION["conectado"] = '0';
            }
            header("location:usuario.php");
        } catch (Exception $e) {
            Erro::trataErro($e);
        }
    } else {
        print '<li><a href="../login.html">Login</a></li>';
    }
} else {
    print '<li><a href="#">' . $_SESSION["email"].'</a></li>';
    print '<li><a href="usuario.php?logout=1">Logout</a></li>';
}
if (isset($_POST["sair"])) {
    $login = new login();
    $login->logout();
    header("location:../login.html");
}
?>
</html>