<?php

namespace cadastrologin;
class cadastrologin
{
    private $senha;
    private $email;

#-----------------------------------------------------------------------------------------------#

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($e)
    {
        $this->email = $e;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($s)
    {
        $this->senha = $s;
    }


#--------------------------------------------------------------------------------------------#
    public function cadastrologin($cpf, $mail, $senha)
    {
    try {

        require_once 'conexao.php';

        $link = conexao::Conecta();
        $query = "INSERT INTO login VALUES (:aa, :bb, :cc);";


        $stmt = $link->prepare($query);
        $stmt->bindParam(':aa', $cpf);
        $stmt->bindParam(':bb', $mail);
        $stmt->bindParam(':cc', $senha);
        $stmt->execute();


        $result = $stmt->execute();

        if (!$result) {
            var_dump($stmt->errorInfo());
            exit;
        }

        echo $stmt->rowCount() . "linhas inseridas";

    }catch (\PDOException $e){
        echo $e->getMessage();
    }


}
}
?>