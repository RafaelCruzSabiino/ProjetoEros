$(document).ready(function()
{
    $("#depois").css({display: "none"});
    BuscarPessoas();
});

function BuscarPessoas(Procurar="")
{
    $.post(
        "../Controllers/Gerenciar.php?Controller=EntrarController&Funcao=BuscarPessoas",
        {
            Procurar: Procurar
        },function(data)
        {
            if(data != 0)
            {
                $Info = JSON.parse(data);
                $("#ReturnInfo").html("");
                $("#ReturnInfo").append($Info);
            }
            else
            {
                $("#ReturnInfo").html("");
                $("#ReturnInfo").append("<label>Nenhuma pessoa logada</label>");
            }
        }

    );
}

function BuscarPerfil(Usuario)
{
    window.open("PerfilAmigo.php?Usuario="+Usuario, "_self");
}

$("#Pesquisa").click(function()
{
    $("#antes").fadeOut();
    $("#depois").fadeIn();
});

$("#Retornar").click(function()
{
    $("#depois").fadeOut();
    $("#antes").fadeIn();
});

$("#TextoPesquisa").keyup(function(e)
{
    BuscarPessoas(e.target.value);
});