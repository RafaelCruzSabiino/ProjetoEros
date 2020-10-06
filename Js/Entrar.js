$(document).ready(function()
{
    $("#Procurar").css({display: "none"});
    BuscarBalada();
});

function BuscarBalada(Procurar="")
{
    $.post(
        "../Controllers/Gerenciar.php?Controller=EntrarController&Funcao=BuscarBalada",
        {
            Procurar : Procurar
        },function(data)
        {
            if(data == 1)
            {
                window.open("../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=Balada", "_self");
            }
            else if(data == 0)
            {
                $("#ReturnBalada").html("");
                $("#ReturnBalada").append("<label>Nada Encontrado</label>")
            }
            else
            {
                Info = data;
                $("#ReturnBalada").html("");
                $("#ReturnBalada").append(Info);
            }
        }
    );
}

$("#Procurar").keyup(function(e)
{
    BuscarBalada(e.target.value);
});

function BuscarPerfil(Usuario)
{
    window.open("PerfilAmigo.php?Usuario="+Usuario, "_self");
}

$("#Pesquisa").click(function(){
    $("#Pesquisa").fadeOut();
    $("#Procurar").fadeIn();
});