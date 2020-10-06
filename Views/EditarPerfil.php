<?php
    include 'Header.php';
?>
<h1 class="text-center">Editar Perfil</h1>
<br>
<div class="container">
<form method="POST" enctype="multipart/form-data" action="../Controllers/Gerenciar.php?Controller=UsuarioController&Funcao=AlterarUsuario">
    <div class="row">
        <input type="hidden" name="Inicial" id="InicialPost" class="form-control">
        <input type="hidden" name="InicialSize" id="InicialSize" class="form-control">
        <input type="hidden" name="InicialType" id="InicialType" class="form-control">
        <input type="hidden" name="Perfil" id="Perfil" class="form-control">
        <input type="hidden" name="Endereco" id="Endereco" class="form-control">

        <div class="col-sm-4">
            <label>Nome:</label>            
            <input type="text" name="Nome" id="Nome" class="form-control" required="required" disabled>            
        </div>
        <div class="col-sm-4">
            <label>Nick:</label>            
            <input type="text" name="Abreviacao" id="Abreviacao" class="form-control" required="required" disabled>            
        </div>
        <div class="col-sm-4">
            <?php if($_SESSION["DadosUser"]["Tipo"] == "PF"){ ?>
            <label>Data Nascimento:</label>
            <?php }else{ ?>   
            <label>Data Inauguração:</label>
            <?php } ?>         
            <input type="date" name="DataNascimento" id="DataNascimento" class="form-control" required="required" disabled>            
        </div>
    </div>
    <br>
    <div class="row">
        <?php if($_SESSION["DadosUser"]["Tipo"] != "PF"){ ?>
        <div class="col-sm-3">
            <label>Cnpj:</label>            
            <input type="text" name="Cnpj" id="Cnpj" class="form-control" required="required" disabled>            
        </div>
        <?php } ?>
        <div class="col-sm-3">
            <label>E-mail Pessoal:</label>            
            <input type="email" name="EmailPessoal" id="EmailPessoal" class="form-control" required="required" disabled>            
        </div>
        <div class="col-sm-3">
            <label>E-mail Eros:</label>            
            <input type="email" name="Email" id="Email" class="form-control" required="required" disabled>            
        </div>
        <div class="col-sm-3">
            <label>Senha:</label>            
            <input type="password" name="Senha" id="Senha" class="form-control" required="required" disabled>            
        </div>
        <?php if($_SESSION["DadosUser"]["Tipo"] == "PF"){ ?>
        <div class="col-sm-3">
            <label>Sexo:</label>           
            <select name="Sexo" id="Sexo" class="form-control" required="required" required="required" disabled>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>                       
        </div>
        <?php } ?>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <label>Foto de Rosto:</label>            
            <input type="file" name="InicialFile" id="Inicial" class="form-control" disabled>            
        </div>
        <div class="col-sm-8">
            <label>Status:</label>           
            <input type="text" name="Status" id="Status" class="form-control" disabled>            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <center><img id="ImagemInicial" class="img-responsive" alt="Image"></center>          
        </div>
        <div class="col-sm-8">
            <label>Observação:</label>          
            <textarea name="Observacao" id="Observacao" class="form-control" rows="2" disabled></textarea>                        
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <center>
            <?php if($_SESSION["DadosUser"]["Tipo"] == "PF"){ ?>
            <select name="Permissao" id="Permissao" class="form-control" required="required" disabled>
                <option value="Todos">Desbloqueado: Todos</option>
                <option value="Amigos">Apenas Amigos</option>
            </select>  
            <?php } ?>
            </center>          
        </div>
        <div class="col-sm-4"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <center>
            <button type="button" class="btn btn-danger" id="BtnAntes">Alterar</button>
            <button type="submit" class="btn btn-primary" id="BtnDepois">Confirmar</button>
            </center>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-danger" id="BtnCancelar">Cancelar</button>
        </div>
    </div>
</form>
</div>
<?php
    include 'Footer.php';
?>
<script src="../Js/EditarPerfil.js"></script>