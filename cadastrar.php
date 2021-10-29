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