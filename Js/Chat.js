$(document).ready(function()
{
    $("#Topo").css({display: "none"});
    Usuario = window.location.search.replace("?", "");
    BuscarPessoas();
    if(Usuario != "")
    {
        Usuario = Usuario.split("=")[1];
        $("#IdUser").val(Usuario);

        $.post(
            "../Controllers/Gerenciar.php?Controller=ChatController&Funcao=BuscarUserChat",{
                Usuario: Usuario
            },function(data){
                if(data != 0){
                    Info = JSON.parse(data);
                    $("#Topo").fadeIn();
                    $("#ReturnTopo").append("<br>"+
                        "<div class='col-sm-7'></div>"
                        +"<center>"
                        +"<div class='col-sm-2'>"
                            +"<a href='#' onclick='BuscarUsuario("+Info.Id+")''><label style='color:red;'>"+Info.Abreviacao+"</label><br>"
                        +"</div>"
                        +"<div class='col-sm-3'>"
                            +"<img src='data:image/png;base64,"+Info.Inicial+"' class='img-circle' alt='Image' style='width: 50%; z-index: 700; position: inherit; border: 1px solid black; padding: 4px;'>"
                        +"</div>"
                        +"</center>"
                    +"");
                    if(Info.Chat != "")
                    {
                        BuscarMensagens(Info.Chat);
                    }
                    else
                    {
                        $("#ReturnMessage").html("");
                        $("#ReturnMessage").append(""+
                            "<div class='row'>"
                                +"<div class='col-sm-12'>"
                                    +"<center><label>Sem mensagem.</label></center>"
                                +"</div>"
                            +"</div>"
                        +"");
                    }
                }
                else
                {
                    alert("Erro!");
                }
            }
        );
    }
    else
    {
        $("#ReturnMessage").html("");
        $("#ReturnMessage").append(""+
            "<div class='row'>"
                +"<div class='col-sm-12'>"
                    +"<center><label>Selecione Algum Amigo</label></center>"
                +"</div>"
            +"</div>"
        +"");
    }
});

$("#Enviar").click(function()
{
    Usuario     = $("#IdUser").val();
    Mensagem    = $("#Mensagem").val();
    if(Mensagem != "")
    { 
        $.post(
            "../Controllers/Gerenciar.php?Controller=ChatController&Funcao=InserirMensagem",
            {
                Usuario     : Usuario,
                Mensagem    : Mensagem
            },function(data)
            {
                if(data != 0)
                {
                    Info = JSON.parse(data);
                    if(Info.Date == "New")
                    {
                        BuscarPessoas();
                    }
                    BuscarMensagens(Info.Id);
                }
                else
                {
                    alert("Erro");
                }
            }
        );
    }
    else
    {
        alert("Escreva Algo!");
    }
});

function BuscarMensagens(Chat)
{
    $.post(
        "../Controllers/Gerenciar.php?Controller=ChatController&Funcao=BuscarMensagem",
        {
            Chat : Chat
        },function(data)
        {
            if(data != 0)
            {
                Info = JSON.parse(data);
                $("#ReturnMessage").html("");
                for(var i=0; i<Info.length; i++)
                {
                    $("#ReturnMessage").append(""+
                        "<div class='"+Info[i].CLASS+"' style='"+Info[i].STYLE+"'>"+Info[i].MENSAGEM+"</div>"
                    +"");
                }
                $("#Mensagem").val("");
            }
            else
            {
                alert("Erro");
            }
        }
    );
}

function BuscarPessoas()
{
    $.post(
        "../Controllers/Gerenciar.php?Controller=ChatController&Funcao=BuscarPessoas",
        {

        },function(data)
        {
            if(data != 0)
            {   
                Info = JSON.parse(data);
                $("#ReturnPessoas").html("");
                for(var i=0; i<Info.length; i++)
                {
                    $("#ReturnPessoas").append("<br>"+
                        "<div class='row'>"
                            +"<div class='col-sm-1'></div>"
                            +"<div class='col-sm-4'>"
                                +"<img src='data:image/png;base64,"+Info[i].Inicial+"' class='img-circle' alt='Image' style='width: 100%; z-index: 700; position: inherit; border: 1px solid black; padding: 4px;'>"
                            +"</div>"
                            +"<div class='col-sm-6'>"
                                +"<a style='color:black;' href='Chat.php?Usuario="+Info[i].Id+"'><label>"+Info[i].Abreviacao+"</label></a>"
                            +"</div>"
                            +"<div class='col-sm-1'></div>"
                        +"</div>"
                    +"");
                }
            }
            else
            {
                alert("Erro!");
            }
        }
    );
}


function BuscarUsuario(Usuario)
{
    window.open("PerfilAmigo.php?Usuario="+Usuario, "_self");
}