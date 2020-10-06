<?php
    include "Header.php";
?>
    <br>
    <div class="container">
        <div class="row" id="antes">   
            <div class="col-sm-4"></div> 
            <div class="col-sm-4">    
                <center><label id="Pesquisa"><u>Pesquisar Pessoas</u> <i class="fa fa-search"></i></label></center>
            </div>
            <div class="col-sm-4"></div> 
        </div>
        <div class="row" id="depois">   
            <div class="col-sm-4"></div> 
            <div class="col-sm-4">    
                <center>
                <input type="text" name="TextoPesquisa" id="TextoPesquisa" class="form-control">
                </center>
            </div>
            <div class="col-sm-2">                
                <button type="button" id="Retornar" class="btn btn-default" style="color: red;">X</button>                
            </div>
            <div class="col-sm-2"></div> 
        </div>
    </div>
    <br>
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <center><h3 class="panel-title"><b>Pessoas</b></h3></center>
            </div>
            <div class="panel-body">
                <div class="container">   
                    <div id="ReturnInfo"></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <center>
                <a href="../Controllers/Gerenciar.php?Controller=EntrarController&Funcao=SairBalada"><button type="button" class="btn btn-danger">Sair</button></a>
                </center>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

<?php
    include "Footer.php";
?>
<script src="../Js/Balada.js"></script>