<?php
    require_once 'TF/usuarios.php';
    $u = new Usuario;


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