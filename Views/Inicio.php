<?php
    include 'Header.php';
?>
    <div class="container">
        <?php if($_SESSION["DadosUser"]["Tipo"] != "PF"){ ?>
            <div class="row" id="InsertPublic">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <center>
                    <button type="button" class="btn btn-danger" id="Publicacao">Inserir Publicação</button>
                    </center>
                </div>
                <div class="col-sm-4"></div>
            </div>
        <?php } ?>
        <div class="row" id="Insert">
            <div class="container">
                <form method="POST" enctype="multipart/form-data" action="../Controllers/Gerenciar.php?Controller=PublicacaoController&Funcao=InserirPublicacao&Pagina=Inicio">
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
        <!-- Fim Insert Publicação -->
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10" id="ReturnPublicacao"></div>
            <div class="col-sm-1"></div>
        </div>
    </div>
<?php
    include 'Footer.php';
?>
<script src="../Js/Inicio.js"></script>