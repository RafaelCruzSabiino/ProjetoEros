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
            <div class="col-sm-4">                            
                <center><a href="../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=EditarPerfil"><button type="button" class="btn btn-danger"><i class="fa fa-edit"></i></button></a></center>                                  
            </div>
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
                        <div class="row" id="GaleriaBack">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <center>
                                    <button type="button" class="btn btn-danger" id="GaleriaButton">Inserir Foto</button>
                                </center>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                        <div class="row">
                            <div class="container" id="InsertGaleria">
                                <form method="POST" enctype="multipart/form-data" action="../Controllers/Gerenciar.php?Controller=GaleriaController&Funcao=InserirGaleria">
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">                        
                                            <center><button type="button" class="btn btn-danger" id="BackInsertGaleria"><i class="fa fa-close"></i></button></center>                                              
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">                        
                                            <textarea name="Legenda" id="Legenda" class="form-control" rows="2" required="required" placeholder="Adicione uma legenda?"></textarea>                        
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <br>   
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">                      
                                            <input type="file" name="Imagem" id="Imagem" class="form-control">                                                
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">                       
                                            <center><img class="img-responsive" alt="Image" id="ImagemInsert"></center>                        
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">                        
                                            <center><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button></center>                                              
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                            <div class="row" id="InsertPublic">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <center>
                                                    <button type="button" class="btn btn-danger" id="PublicacaoButton">Inserir Publicação</button>
                                                    </center>
                                                </div>
                                                <div class="col-sm-4"></div>
                                            </div>
                                            <div class="row" id="Insert">
                                                <div class="container">
                                                    <form method="POST" enctype="multipart/form-data" action="../Controllers/Gerenciar.php?Controller=PublicacaoController&Funcao=InserirPublicacao&Pagina=Perfil">
                                                        <div class="row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-4">                        
                                                                <center><button type="button" class="btn btn-danger" id="BackInsert"><i class="fa fa-close"></i></button></center>                                              
                                                            </div>
                                                            <div class="col-sm-4"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">                        
                                                                <textarea name="Texto" id="Texto" class="form-control" rows="3" required="required" placeholder="Sobre o que está pensando?"></textarea>                        
                                                            </div>
                                                            <div class="col-sm-2"></div>
                                                        </div>
                                                        <br>    
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">                       
                                                                <input type="text" name="Link" id="Link" class="form-control" placeholder="Deseja inserir algum link?">                                                
                                                            </div>
                                                            <div class="col-sm-2"></div>
                                                        </div>
                                                        <br>   
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8"> 
                                                                <label>Deseja adicionar alguma imagem?</label>                      
                                                                <input type="file" name="Imagem" id="Imagem2" class="form-control">                                                
                                                            </div>
                                                            <div class="col-sm-2"></div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-8">                       
                                                                <center><img class="img-responsive" alt="Image" id="ImagemInsert2"></center>                        
                                                            </div>
                                                            <div class="col-sm-2"></div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-4">                        
                                                                <center><button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button></center>                                              
                                                            </div>
                                                            <div class="col-sm-4"></div>
                                                        </div>
                                                    </form>
                                                </div>            
                                            </div>
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
<script src="../Js/Perfil.js"></script>