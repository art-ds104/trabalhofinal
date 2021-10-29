<?php
    require_once 'TF/usuarios.php';
    $u = new Usuario;
?>
<html lang="pt-br">
    <head>
        <title>login</title>
        <meta charset="UTF-8">
        <script src="acesso.js"></script>
    </head>
    <style>
        *{margin:0;padding:0;box-sizing: border-box;}
        body{
            background-color: 5F9EA0;
        }

        form{
            background-color: white;
            max-width: 500px;
            width: 70%;
            padding: 20px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        form h3{
            text-align: center;
            color: #5F9EA0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        form input[type=text],
        form input[type=password]{
            width: 100%;
            height: 45px;
            border:1px solid #ccc ;
            padding-left: 10px;
            margin:10px 0;
        }
        form input[type=button]{
            width: 100%;
            height: 30px;
            cursor: pointer;
            background:#5F9EA0;
            color: white;
            border: 0;
            border-radius: 20px;
        }
           

    </style>
        
    
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