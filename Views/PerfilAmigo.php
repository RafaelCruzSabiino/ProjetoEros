<?php
    include 'Header.php';
?>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-sm-4">
                    <center><img id="ImagemInicial" class="img-circle" alt="Image"></center>
                </div>
                <div class="col-sm-8">
                    <br>
                    <center>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2><div id="Nome"></div></h2>        
                            </div>
                            <?php if($_SESSION["DadosUser"]["Tipo"] == "PF"){ ?>
                                <div class="col-sm-6">
                                    <h2><div id="Sexo"></div></h2>  
                                </div>
                            <?php }else{ ?>
                                <div class="col-sm-6">
                                    <h2><div id="Endereco"></div>Endereço</h2>  
                                </div>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <h2><div id="Abreviacao"></div></h2>        
                            </div>
                            <div class="col-sm-6">
                                <h2><div id="Observacao"></div></h2>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>SP - JAU<div id="Cidade"></div> <div id="Estado"></div></h2>        
                            </div>
                            <div class="col-sm-6"></div>
                        </div>
                        <br>
                    </div>  
                    </center>                  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <center><h2><div id="Status"></div></h2></center>
            </div>
        </div>
        <br>
        <div class="panel panel-info">
              <div class="panel-heading">
                    <center><h3 class="panel-title"><a href="#" id="GaleriaGo">Galeria</a> | <a href="#" id="PublicacaoGo">Publicações</a></h3></center>
              </div>
              <br>
              <div class="panel-body">
                    <div class="container" id="Galeria">
                        <br>
                        <div class="row">     
                            <center>                     
                            <div id="ReturnImage"></div>           
                            </center>         
                        </div>
                    </div>
                    <div class="container" id="Publicacao">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <div class="panel panel-info" id="PanelPerfil">
                                    <div class="panel-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-10" id="ReturnPublicacao"></div>
                                                <div class="col-sm-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
              </div>
        </div>      
    </div> 
<?php
    include 'Footer.php';
?>

<script src="../Js/PerfilAmigo.js"></script>