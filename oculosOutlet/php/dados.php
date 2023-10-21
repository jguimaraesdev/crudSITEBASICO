<!DOCTYPE html>
<html lang="pt-br">
<head>

    <link rel="stylesheet" href="../css/login.css"/>
    <meta charset="UTF-8"/>
    <title>Login</title>
    <script src="https://kit.fontawesome.com/2198696111.js" crossorigin="anonymous"></script>
</head>
<!------------------------------------------------------------------------------------------------>
<body id="image">
<div id="interface">

    <header id="cabecalho">


        <img id= "logotipo" src="../img/sol2.jpg"/>

    </header>
    <section>
        <!------------------------------------------------------------------------------------------------>
        <article id="noticia-principal">

            <!------------------------------------------------------------------------------------------------>
            <header id="cabecalho-artigo">
                <hgroup>

                    <h2>Identifique-se:</h2>

                </hgroup>
            </header>
            <!------------------------------------------------------------------------------------------------>
            <nav id= "menu">

                <ul>
                    <li><a href= "index.html"><i class="fas fa-home"></i> Home</a></li>
                    <li id="cadastro"><a href= "cadastro.html"><i class="fas fa-user-plus"></i> Cadastre-se</a></li>
                </ul>
            </nav>

            <section>
                <!------------------------------------------------------------------------------------------------>
<?php
try{


include 'pessoa.php';
include 'cadastrologin.php';
include 'enderecopessoa.php';



$novo = new pessoa();

$novo->cadastro($_POST['tCpf'],$_POST['tNasc'],$_POST['tNome'],$_POST['ttipo'],$_POST['tCel']);

$novo1 = new \enderecopessoa\enderecopessoa();

$novo1->pessoaendereco($_POST['tCpf'],$_POST['tRua'],$_POST['tNum'],$_POST['tCid'],$_POST['tEst'],$_POST['tCep'],$_POST['tCompl']);


$novo2 = new \cadastrologin\cadastrologin();
$novo2->cadastrologin($_POST['tCpf'], $_POST['tMail'], $_POST['tSenha']);


echo"<h2>Cadastro realizado com Sucesso!!</h2>";

}catch (PDOException $e){
    echo $e->getMessage();
}
?>

</article>
</section>

    <!------------------------------------------------------------------------------------------------>
    <footer id="rodape">
        <p>Copyright &copy 2020</p>                          <!--RODAPÉ-->


    </footer>

    <!------------------------------------------------------------------------------------------------>
    </article>
    </section>

</div>
</body>
</html>