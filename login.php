<?php
    session_start();
    $email=$_POST['email'];
    $senha=$_POST['senha'];

    if($_POST['email']){
        $usuarios=[
            [
            "nome"=>"Larissa",
            "email"=>"larissa@coder.com.br",
            "senha"=>"123456"
            ],
            [
            "nome"=>"Mateus",
            "email"=>"mateus@coder.com.br",
            "senha"=>"123",
            ],
        ];

        foreach($usuarios as $usuario){
            $emailValido=$email===$usuario['email'];
            $senhaValida=$senha===$usuario['senha'];

            if($emailValido&&$senhaValida){
                $_SESSION['erros']=null;
                $_SESSION['usuario']=$usuario['nome'];
                $exp=time()+60*60*24*30;
                setcookie('usuario',$usuario['nome'],$exp);
                header('Location: index.php');
            }

        }

        if(!$_SESSION['usuario']){
            $_SESSION['erros']=['Usuário/senha inválida!'];
        }
    } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/estilo.css">
    <link rel="stylesheet" href="recursos/css/login.css">
    <title>PHP </title>
</head>
<body class="login">
    <header class="cabecalho">
        <h1>PHP</h1>
        <h2>Seja bem vinda</h2>
    </header>


    <main class="principal">
        <div class="conteudo">
            <h3>Identifique-se</h3>
            <?php if($_SESSION['erros']):?>
                <div class="erros">
                    <?php foreach($_SESSION['erros'] as $erros):?>
                        <p><?=$erros?></p>
                    <?php endforeach?>

                </div>                              
                
            <?php endif?>
            <form action="#" method="post">
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email"> 
                </div>
                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha"> 
                </div>
                <button>Entrar</button>

            </form>
            
        </div>
    </main>
    <footer class="rodape">
        COD3R & Larissa © <?= date('Y'); ?>
    </footer>
</body>
</html>

