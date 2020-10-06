<?php
    include 'Header.php';
?>
<style>
      .userLogado
  {
      width                       : 70%;
      margin-left                 : 2%;
      margin-right                : 2%;
      margin-top                  : 2.5%;
      margin-bottom               : 2.5%;
      border-top-left-radius      : 20px;
      border-top-right-radius     : 20px;
      border-bottom-left-radius   : 20px;
      float                       : right;
      padding                     : 3%;
      border                      : 1px solid gray;
  }
</style>
<h1 class="text-center">Chat</h1>
<br>
<div class="panel panel-info">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="container" style="height: 450px; width: 100%; border: 1px solid black;"> 
                            <div id="ReturnPessoas"></div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="container" style="height: 450px; width: 100%; border: 1px solid black;">
                            <div class="row" id="Topo">
                                <div id="ReturnTopo"></div>
                            </div>
                            <br>
                            <input type="hidden" name="IdUser" id="IdUser" class="form-control" value="">
                            <div class="boxMsg" id="boxMsg">
                                <div class="Mensagens" id="Mensagens">
                                    <div id="ReturnMessage"></div>  
                                </div>   
                            </div>       
                            <br>
                            <div class="row" style="position: absolute; bottom:0; padding:2%">  
                                <div class="col-sm-8">                                  
                                    <center><input type="text" name="Mensagem" id="Mensagem" class="form-control" style="width: 100%;"></center>                                    
                                </div>
                                <div class="col-sm-4">
                                    <center>
                                    <button type="button" class="btn btn-primary" id="Enviar">Enviar</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
</div>

<?php
    include 'Footer.php';
?>
<script src="../Js/Chat.js"></script>


