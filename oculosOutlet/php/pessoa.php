<?php


 class pessoa{
     private $cpf;
     private $nome;
     private $cel;
     private $sexo;
     private $datanasci;


 #--------------------------------------------------------------------------------------------#


     public function getCpf(){
         return $this->cpf;
     }

     public function setCpf($cpf){
         $this->cpf = $cpf;
     }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n){
        $this->nome = $n;
    }

     public function getCel(){
         return $this->cel;
     }

     public function setCel($cel){
         $this->cel = $cel;
     }


    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($s){
        $this->sexo = $s;
    }

    public function getDataNasci(){
        return $this->datanasci;
    }

    public function setDataNasci($d){
        $this->datanasci = $d;
    }




#--------------------------------------------------------------------------------------------#
    public function cadastro($cpf,$data, $nome, $sexo, $cel){
    try {
        require_once 'conexao.php';

        $link = Conexao::Conecta();

        $query = "INSERT INTO pessoa VALUES (:aa,:bb,:cc,:dd,:ee);";


        $stmt = $link->prepare($query);
        $stmt->bindParam(':aa', $cpf);
        $stmt->bindParam(':bb', $data);
        $stmt->bindParam(':cc', $nome);
        $stmt->bindParam(':dd', $sexo);
        $stmt->bindParam(':ee', $cel);


        $result = $stmt->execute();

        if (!$result) {
            var_dump($stmt->errorInfo());
            exit;
        }

        echo $stmt->rowCount() . "linhas inseridas";

    }catch (PDOException $e){
        if($e->getMessage() == 'SQLSTATE[23000]');
            echo "<h2> Este usuário já existe !!</h2>";

        }
}

}

?>