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
        div#msg-suc
        {
            width: 400px;
            margin:10px auto;
            padding: 10px;
            background-color:rgba(50,205,50,.3); ;
            border:1px solid rgb(34,139,34);

        }
        div.msg-Erro
        {
            width: 400px;
            margin:10px auto;
            padding: 10px;
            background-color:rgba(250,128,,114,.3); ;
            border:1px solid rgb(165,42,42);


        }
           

    </style>
        
    
    <body>
        
        <form>
            <h3>Cadastro</h3>
           
            <form method="POST" >

            <input type="text" name="email" placeholder="e-mail" maxlenght="40"/>

            <input type="text" name="nome" placeholder="nome" maxlenght="30"/>

            <input type="password" name="senha" placeholder="senha" maxlenght="30"/>

            <input type="password" name="confSenha"  placeholder="confirme a senha" maxlenght="30"/>

            <input type="button" name="botao" value="ACESSAR"/> 

            <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se aqui</strong>
            
        </form>

        <?php
            if (isset($_POST['nome']))
            {
                $email = addslashes($_POST['email']);
                $nome = addslashes($_POST['nome']);
                $senha = addslashes($_POST['senha']);
                $confirmarsenha = addslashes($_POST['confSenha']);

                if(!empty($nome) && !empty($email) && !empety($senha) &&!empty($confirmarSenha))
                {
                    $u->conectar("login_tcc","localhost","root","");
                    if($u->msgErro == "")
                    {
                        if($senha == $confirmarSenha)
                        {
                            if($u->cadastrar($email,$nome,$senha))
                            (
                                ?>
                                <div id ="msg-suc">
                                 cadastro concluido
                                </div>
                                <?php
                            )
                            else
                            {   
                                ?>
                                <div class ="msg-Erro">
                                 email já cadastrado"
                                </div>
                                <?php
                            }
                               

                        }
                        else
                        {
                            ?>
                            <div class ="msg-Erro">
                               senhas diferentes foram usadas
                            </div>
                            <?php
                        }
                        
                    }
                    else
                    {
                        ?>
                        <div class ="msg-Erro">
                        <?php echo "erro: ".$u->msgErro; ?>
                        </div>
                       <?php
                        

                    }
                }else
                {
                    ?>
                    <div class ="msg-Erro">
                     Preencha todos os campos!
                    </div>
                    <?php
                }
            }


        ?>
    </body>
</html>