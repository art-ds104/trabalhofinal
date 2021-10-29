<?php
    require_once 'TF/usuarios.php';
    $u = new Usuario;

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
   