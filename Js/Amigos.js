$("#Procurar").change(function(e)
{
    Procurar = e.target.value;
    if(Procurar != "")
    {
        $.post(
            "../Controllers/Gerenciar.php?Controller=UsuarioController&Funcao=BuscarUsuarioLista"
            ,{  
                Procurar : Procurar
            },function(data)
            {
                if(data != 0)
                {
                    Info = JSON.parse(data);
                    $("#ReturnPesquisa").html("");
                    for(var i=0; i<Info.length; i++)
                    {
                        $("#ReturnPesquisa").append(""+
                        "<div class='container'>"
                            +"<div class='row'>"
                                +"<div class='col-sm-2'>"
                                    +"<img src='data:image/png;base64,"+Info[i].INICIAL+"' class='img-circle profile_img alt='Image'>"
                                +"</div>"
                                +"<div class='col-sm-6'>"
                                    +"<br>"
                                    +"<h5>"+Info[i].NOME+"</h5>"
                                    +"<p>"+Info[i].ABREVIACAO+"</p>"
                                +"</div>"
                                +"<div class='col-sm-2'>"
                                    +"<br>"
                                    +"<center>"
                                    +"<a href='Chat.php?Usuario="+Info[i].ID+"' style='color: black'>"
                                        +"<i class='fa fa-comments-o'></i>"
                                        +"<p>Chat</p>"
                                    +"</a>"
                                    +"</center>"
                                 +"</div>"
                                +"<div class='col-sm-2'>"
                                    +"<br>"
                                    +"<center>"
                                    +"<a href='#' onclick='BuscarUsuario("+Info[i].ID+")' style='color: red'>"
                                        +"<i class='fa fa-user'></i>"
                                        +"<p>Ver Perfil</p>"
                                    +"</a>"
                                    +"</center>"
                                +"</div>"
                            +"</div>"   
                        +"</div>" 
                        +"");
                    }   
                }
                else
                {
                    $("#ReturnPesquisa").html("");
                }
            }
        );
    }
    else
    {
        $("#ReturnPesquisa").html("");
    }
});

function BuscarUsuario(Usuario)
{
    window.open("PerfilAmigo.php?Usuario="+Usuario, "_self");
}