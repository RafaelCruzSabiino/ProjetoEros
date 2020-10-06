$(document).ready(function(){
    $("#Insert").css({display: "none"});
    $("#Publicacao").css({display: "none"});
    $("#InsertGaleria").css({display: "none"});
    $("#GaleriaGo").css({color: "red"});
    var FiltroUsuario = "Todos";
    $.post(
        "../Controllers/Gerenciar.php?Controller=UsuarioController&Funcao=BuscarUsuarioSession",{
            FiltroUsuario: FiltroUsuario
        },function(data){
            if(data != 0){
                Info = JSON.parse(data);
                $("#Nome").html(Info.Nome);
                $("#Abreviacao").html(Info.Abreviacao);
                $("#Status").append("<label>'"+Info.Status+"'</label>");
                $("#Sexo").html(Info.Sexo);
                $("#Observacao").html(Info.Observacao);
                $("#ImagemInicial").prop("src", "data:image/png;base64,"+Info.Inicial);
                BuscarPublicacao(0);
                BuscarGaleria();
            }
            else{
                alert("Erro");
            }
        }
    );
});

$("#GaleriaGo, #PublicacaoGo").click(function(e){
    if(e.target.id == "PublicacaoGo"){
        $("#Publicacao").fadeIn();
        $("#Galeria").fadeOut();
        $("#PublicacaoGo").css({color: "red"});
        $("#GaleriaGo").css({color: "black"});
    }
    else{
        $("#Publicacao").fadeOut();
        $("#Galeria").fadeIn();
        $("#PublicacaoGo").css({color: "black"});
        $("#GaleriaGo").css({color: "red"});
    }
});

$("#PublicacaoButton").click(function(){
    $("#Insert").fadeIn();
    $("#InsertPublic").fadeOut();
});

$("#BackInsert").click(function(){
    $("#Insert").fadeOut();
    $("#InsertPublic").fadeIn();
});

$("#GaleriaButton").click(function(){
    $("#GaleriaBack").fadeOut();
    $("#InsertGaleria").fadeIn();
});

$("#ImagemGaleria").click(function(){
    alert("Funcionaou");
});

$("#Imagem, #Imagem2").change(function(e){
    var Inicial = new FormData();
    if(e.target.id == "Imagem2"){
        Inicial.append('file', $('#Imagem2')[0].files[0]);
    }else{
        Inicial.append('file', $('#Imagem')[0].files[0]);
    }

    $.ajax({
        url : '../Controllers/Gerenciar.php?Controller=HomeController&Funcao=ImageToImage',
        type : 'POST',
        data : Inicial,
        async: false,
        cache: false,
        contentType: false,
        enctype: 'multipart/form-data',
        processData: false,
        success : function(ret) {
            if(ret != "")
            {
                if(e.target.id == "Imagem2"){
                    $("#ImagemInsert2").fadeIn();
                    $("#ImagemInsert2").prop("src", ret);
                }else{
                    $("#ImagemInsert").fadeIn();
                    $("#ImagemInsert").prop("src", ret);
                }
            }
            else
            {
                return
            }
        }
    });
});


function BuscarPublicacao(Contador)
{
    Filtro  = "Perfil";
    Usuario = ""; 
    $.post(
        "../Controllers/Gerenciar.php?Controller=PublicacaoController&Funcao=BuscarPublicacao"
        ,{
            Contador: Contador,
            Filtro  : Filtro,
            Usuario : Usuario
        }
        ,function(data)
        {
            if(data != 0)
            {
                Info = JSON.parse(data);
                $("#ReturnPublicacao").append(Info);
            }
            else
            {
                alert("Erro");
            }
        }
    );
}

function BuscarGaleria()
{
    Usuario = "";
    $.post(
        "../Controllers/Gerenciar.php?Controller=GaleriaController&Funcao=BuscarGaleria",{
            Usuario : Usuario
        },function(data)
        {
            if(data != 0)
            {
                Info = JSON.parse(data);
                $("#ReturnImage").append(Info);
            }
            else
            {
                alert("Erro");
            }
        }
    );
}

function Curtir(Publicacao,Count)
{
    if($("#Curtida"+Count).hasClass("fa fa-heart-o"))
    {
        Funcao = "Curtir";
    }
    else
    {
        Funcao = "Descurtir";
    }
    
    $.post(
        "../Controllers/Gerenciar.php?Controller=PublicacaoController&Funcao="+Funcao,
        {
            Publicacao: Publicacao
        },function(data)
        {
            if(data != "Erro")
            {
                if(Funcao == "Curtir")
                {
                    $("#Curtida"+Count).removeClass("fa fa-heart-o").addClass("fa fa-heart");
                    $("#NumeroCurtida"+Count).val(data);
                }
                else
                {
                    $("#Curtida"+Count).removeClass("fa fa-heart").addClass("fa fa-heart-o");
                    $("#NumeroCurtida"+Count).val(data);
                }
            }
            else
            {
                alert("Erro");
            }
        }
    );
}

function InserirComentario(Publicacao, Count)
{
    Texto = $("#TextoComentario"+Count).val();

    if(Texto != "")
    {
        $.post(
            "../Controllers/Gerenciar.php?Controller=PublicacaoController&Funcao=InsertComentario",
            {
                Publicacao  : Publicacao
                ,Texto      : Texto  
            },function(data)
            {
                if(data != 0)
                {
                    BuscarComentario(Publicacao, Count, 1);
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
        alert("Nada foi digitado!");
    }
}

function BuscarComentario(Publicacao, Count, Limitador)
{
    $.post(
        "../Controllers/Gerenciar.php?Controller=PublicacaoController&Funcao=BuscarComentario",
        {
            Publicacao : Publicacao
            ,Limitador : Limitador
        },function(data)
        {
            if(data != 0)
            {
                Info = JSON.parse(data);
                if(Limitador == 1)
                {
                    $("#BtnComentAntes"+Count).fadeIn();
                    $("#BtnComentDepois"+Count).fadeOut();
                }
                else
                {
                    $("#BtnComentAntes"+Count).fadeOut();
                    $("#BtnComentDepois"+Count).fadeIn();
                }
                $("#ReturnComentarios"+Count).html("");
                for(i=0; i<Info.length; i++)
                {
                    $("#ReturnComentarios"+Count).append(""+
                        "<div class='row'>"
                            +"<div class='col-sm-2'></div>"
                            +"<div class='col-sm-2'>"
                                +"<img src='data:image/png;base64,"+Info[i].INICIAL+"' class='img-circle' alt='Image' style='width: 80%; z-index: 700; position: inherit; border: 1px solid black; padding: 4px;'>"
                            +"</div>"
                            +"<div class='col-sm-6'>"
                                +"<h4>"+Info[i].ABREVIACAO+"</h4>"
                                +"<label>"+Info[i].TEXTO+"</label>"
                            +"</div>"
                            +"<div class='col-sm-2'></div>"
                        +"</div>"
                    +"");
                }
            }
            else
            {
                $("#ReturnComentarios"+Count).html("");
                $("#ReturnComentarios"+Count).append("<label>Seja o primeiro a comentar</label>");
            }
        }
    );
}