<?php

class login {

    function autentica($mail, $senha) {


        require_once 'conexao.php';
        $query = "SELECT *FROM login WHERE email=:email AND senha=:password";
        $conexao = Conexao::pegarConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':email', $mail);
        $stmt->bindValue(':password', $senha);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_BOTH);
        return $result->conectado;
    }

    function logout(){
        $_SESSION["conectado"]='0';
        $_SESSION["nome"]='';
    }

}
?>