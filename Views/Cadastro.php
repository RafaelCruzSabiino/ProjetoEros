<?php
  session_start();

  if(!isset($_SESSION["DadosUser"]["Id"]))
  {
    session_reset();
    session_destroy();
    header("Location: ../Controllers/Gerenciar.php");
  }

  $Dias = array(
    ["Dia"  => "Sábado",         "Id" => 6]
    ,["Dia" => "Segunda Feira",  "Id" => 1]
    ,["Dia" => "Terça Feira",    "Id" => 2]
    ,["Dia" => "Quarta Feira",   "Id" => 3]
    ,["Dia" => "Quinta Feira",   "Id" => 4]
    ,["Dia" => "Sexta Feira",    "Id" => 5]
    ,["Dia" => "Domingo",        "Id" => 0]
);
?>
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
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>            
              <input type="hidden" name="Tipo" id="Tipo" class="form-control" value="<?= $_SESSION["DadosUser"]["Tipo"] ?>">                       
              <h1>Cadastro</h1>
              <h5>Finalize seus dados!</h5>
              <br>
              <div>
                <?php if($_SESSION["DadosUser"]["Tipo"] == "PF"){ ?>
                  <label>Informe sua data de nascimento:</label>
                <?php }else{ ?>
                  <label>Informe a data de inauguração:</label>
                <?php } ?>
              </div>
              <div>
                <input type="date" id="DataNascimento" class="form-control" required="" />
                <br>
              </div>
              <?php if($_SESSION["DadosUser"]["Tipo"] == "PF"){ ?>
              <div>
                <label>Sexo:</label>
              </div>
              <div>                
                <select name="Sexo" id="Sexo" class="form-control" required="" />
                  <option value="#">Selecionar</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                </select>
                <br>                
              </div>
              <?php } ?>
              <div>
                <label>Seu estado e cidade:</label>
              </div>
              <div>
                <div class="row">
                  <div class="col-sm-5">
                    <select name="Estado" id="Estado" class="form-control">
                      <option value="#">Selecione</section>
                      <?= json_decode($_SESSION["Estados"]) ?>
                    </select>  
                  </div>
                  <div class="col-sm-7">
                    <select name="Cidade" id="Cidade" class="form-control">
                      <option value="#">Selecione</option>
                    </select>
                  </div>
                </div>
                <br>
              </div>
              <div>
                <label>Insira uma foto de rosto:</label>
              </div>
              <div>                
                <input type="file" name="Inicial" id="Inicial" class="form-control">                
              </div>
              <br>
              <div>                
                <img class="img-responsive" id="ImagemInicial" alt="Image">                
              </div>
              <br>
              <?php if($_SESSION["DadosUser"]["Tipo"] != "PF"){ ?>
              <div class="row">
              <?php foreach($Dias as $Dia){ ?>
                  <div class="Liberado" id="DivFuncionamento<?= $Dia["Id"] ?>">
                      <div class="col-md-4">
                          <label> Dia </label>
                          <select id="Dia<?= $Dia["Id"] ?>" class="form-control" disabled>
                              <option value="<?= $Dia["Id"] ?>" selected> <?= $Dia["Dia"] ?> </option>
                          </select>                            
                      </div>
                      <div class="col-md-4">      
                          <label> Hora Início </label>                      
                          <input type="time" id="HoraInicio<?= $Dia["Id"] ?>" class="form-control" value="19:00">                            
                      </div>
                      <div class="col-md-4">
                          <label> Hora Fim </label>                      
                          <input type="time" id="HoraFim<?= $Dia["Id"] ?>" class="form-control" value="05:00">
                      </div>
                  </div>
                  <div class="col-md-6">                            
                      <center><button type="button" id="BtnDia<?= $Dia["Id"] ?>" style="width: 100%;" class="btn btn-info" onclick="Bloquear(<?= $Dia['Id'] ?>)">Aberto</button></center>                            
                  </div>                 
              <?php } ?>
              </div>
              <?php } ?>
              <br>
              <?php if($_SESSION["DadosUser"]["Tipo"] == "PF"){ ?>
              <div>
                <label>Selecione quem pode ver seu perfil:</label>
              </div>
              <div>                
                <select name="Permissao" id="Permissao" class="form-control" required="required">
                  <option value="Todos">Desbloqueado: Todos</option>
                  <option value="Amigos">Apenas Amigos</option>
                </select>                
              </div>
              <?php } ?>
              <br>
              <div>
                <div id="Mensagem"></div>
              </div>
              <div>
                <button type="button" id="Enviar" class="btn btn-default">Cadastrar <i class="fa fa-sign-in"></i></button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-fire"></i>EROS</h1>
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
<script src="../Js/Cadastro.js"></script>