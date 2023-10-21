<?php


namespace enderecopessoa;


class enderecopessoa
{
    private $cep;
    private $rua;
    private $num;
    private $complemento;
    private $cidade;
    private $estado;


    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function setRua($r)
    {
        $this->rua = $r;
    }

    public function getNum()
    {
        return $this->num;
    }

    public function setNum($n)
    {
        $this->num = $n;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cid)
    {
        $this->cidade = $cid;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($e)
    {
        $this->estado = $e;
    }

//-------------------------------------------------------------------------------------------------//

    public function pessoaendereco($cpf,$rua,$num,$cid,$est,$cep,$comp){

    try {

        require_once 'conexao.php';

        $link = conexao::Conecta();

        $query = "INSERT INTO enderecopessoa VALUES ( :aa, :bb, :cc, :dd, :ee, :ff, gg);";


        $stmt = $link->prepare($query);

        $stmt->bindParam(':aa', $cpf);
        $stmt->bindParam(':bb', $rua);
        $stmt->bindParam(':cc', $num);
        $stmt->bindParam(':dd', $cid);
        $stmt->bindParam(':ee', $est);
        $stmt->bindParam(':ff', $cep);
        $stmt->bindParam(':gg', $comp);

        $result = $stmt->execute();

        if (!$result) {
            var_dump($stmt->errorInfo());
            exit;
        }

        echo $stmt->rowCount() . "linhas inseridas";

    }catch(\PDOException $e){
        echo $e->getMessage();
    }

    }
}
?>