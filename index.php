<?php
    require_once 'TF/usuarios.php';
    $u = new Usuario;
?>
<html lang="pt-br">
    <head>
        <title>login</title>
        <link rel="stylesheet" href ="CSS/style.css">
        <meta charset="UTF-8">
        <script src="acesso.js"></script>
    </head>    
    <body>
        
        <form>
            <h3>login e senha</h3>
           
            <form method="POST" >

            <input type="text" name="email" placeholder="Seu e-mail"/>

            <input type="password" name="senha" placeholder="sua senha"/>

            <input type="button" name="botao" value="ACESSAR" /> 
            <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se aqui</strong>
            
        </form>
        <?php

            if (isset($_POST['email']))
            {
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);

                if(!empty($email) && !empety($senha))
                {   
                    $u->conectar("login_tcc","localhost","root","");
                        if(msg-erro == "")
                        {

                            }
                            if($u->logar($email,$senha))
                            {
                                header("location: AreaPrincipal.php")

                            }
                            else
                            {

                                echo "email e/ou senha incorretos"
                            }
                        } 
                        else
                        {
                            echo "Erro: ".$u->msg-Erro;
                        }  
                        

                 }
                else
                 {
                    echo "preencha todos os espaços"


                 }

        ?>
    </body>
</html>