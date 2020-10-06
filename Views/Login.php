<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EROS</title>

    <link href="../FrontEnd/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../FrontEnd/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../FrontEnd/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../FrontEnd/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="../FrontEnd/build/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signout"></a>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=ValidarLogin">
              <h1>Login</h1>
              <div>
                <input type="email" name="Email" class="form-control" placeholder="Exemplo@exemplo.com">
              </div>
              <div>
                <input type="password" name="Criptografia" class="form-control" placeholder="Senha">
              </div>
              <div>
                <button type="submit" class="btn btn-default">Entrar <i class="fa fa-sign-in"></i></button>                
                <a class="reset_pass" href="#">Esqueçeu sua senha?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Crie sua conta:
                  <a>  </a>
                  <a href="#signup" class="to_register" id="Comum"> Usuario Comum </a>
                  <a href="#signout" class="to_register"  id="Empresa"> Empresa </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="../FrontEnd/images/Eros.png" style="width: 35px;" class="img-circle" alt="Image"> EROS</h1>
                  <p>EROS | Template por Colorlib | Desenvolvido por Rafael Sabino</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="POST" action="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=InserirUsuario">              
              <input type="hidden" name="Tipo" id="Tipo" class="form-control" value="PF">  
              <input type="hidden" name="Cnpj" id="Cnpj" class="form-control" value="0">            
              <h1>Cadastro Comum</h1>
              <div>
                <input type="text" name="Nome" class="form-control" placeholder="Nome completo *" required="" />
              </div>
              <div>
                <input type="text" name="Abreviacao" class="form-control" placeholder="Como deseja ser chamado? *" required="" />
              </div>
              <div>
                <input type="email" name="EmailPessoal" class="form-control" placeholder="Insira um e-mail valido *" required="" />
              </div>
              <div>
                <input type="email" name="Email" class="form-control" placeholder="Email do Eros *" required="" />
              </div>
              <div>
                <input type="password" name="Senha" id="Senha" class="form-control" placeholder="Senha *" required="" />
              </div>
              <div>
                <input type="password" name="Confirme" id="Confirme" class="form-control" placeholder="Confirme sua senha *" required="" />
                <div id="RetornarSenha"></div>
              </div>
              <div>
                <button type="submit" id="Enviar" class="btn btn-default">Cadastrar <i class="fa fa-sign-in"></i></button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Já está cadastrado ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-fire"></i> EROS</h1>
                  <p>EROS | Template por Colorlib | Desenvolvido por Rafael Sabino</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register_2" class="animate form registration_form">
          <section class="login_content">
            <form method="POST" action="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=InserirUsuario">
              <input type="hidden" name="Tipo" id="Tipo" class="form-control" value="PJ">  
              <h1>Cadastro Empresarial</h1>
              <div>
                <input type="text" name="Nome" class="form-control" placeholder="Nome completo *" required="" />
              </div>
              <div>
                <input type="text" name="Abreviacao" class="form-control" placeholder="Como deseja ser chamado? *" required="" />
              </div>
              <div>
                <input type="text" name="Cnpj" class="form-control" placeholder="Informe o cnpj da empresa *" required="" />
              </div>
              <div>
                <input type="email" name="EmailPessoal" class="form-control" placeholder="Insira um e-mail valido *" required="" />
              </div>
              <div>
                <input type="email" name="Email" class="form-control" placeholder="Email do Eros *" required="" />
              </div>
              <div>
                <input type="password" name="Senha" id="Senha2" class="form-control" placeholder="Senha *" required="" />
              </div>
              <div>
                <input type="password" name="Confirme" id="Confirme2" class="form-control" placeholder="Confirme sua senha *" required="" />
                <div id="RetornarSenha2"></div>
              </div>
              <div>
                <button type="submit" id="Enviar2" class="btn btn-default">Cadastrar <i class="fa fa-sign-in"></i></button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Já está cadastrado ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-fire"></i> EROS</h1>
                  <p>EROS | Template por Colorlib | Desenvolvido por Rafael Sabino</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../Js/Login.js"></script>
