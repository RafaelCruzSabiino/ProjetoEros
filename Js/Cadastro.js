Usuario = {};

$(document).ready(function(){
    $("#Cidade").fadeOut();
    $("#ImagemInicial").fadeOut();
});

$("#Estado").change(function(){
    Estado = $("#Estado").val();
    if(Estado != "#")
    {
        $.post(
            "../Controllers/Gerenciar.php?Controller=HomeController&Funcao=BuscarCidades",{
                Estado: Estado
            },function(data){
                if(data != 0){
                    info = JSON.parse(data);
                    $("#Cidade").html("");
                    $("#Cidade").append(info);
                    $("#Cidade").fadeIn();
                }
                else
                {
                    return;
                }
            }
        );
    }
    else
    {
        return;
    }
});

// function Usuario()
// {
    // Usuario.Nome = $("#Nome").prop("src", Json[0].IMAGEM);
// }

$("#Enviar").click(function(){
    Usuario.DataNascimento     = $("#DataNascimento").val();
    Usuario.Sexo                = $("#Sexo").val();
    Usuario.Cidade              = $("#Cidade").val();
    Usuario.Permissao           = $("#Permissao").val();

    if($("#Tipo").val() == "PJ"){
        Usuario.Sexo        = "Empresa";
        Usuario.Permissao   = "Todos";

        DiasTrabalhados = [];

        for(var i = 0; i < 7; i++)
        {
            if($("#DivFuncionamento" + i).hasClass("Liberado") )
            {
                InfoDia         = {};
                InfoDia.Dia     = i;
                InfoDia.Inicio  = $("#HoraInicio" + i).val();
                InfoDia.Fim     = $("#HoraFim" + i).val();
    
                DiasTrabalhados[i] = InfoDia;
            }
        }
            Usuario.DiasTrabalhados = DiasTrabalhados;
    }
    if(Usuario.DataNascimento != "" && Usuario.Sexo != "#" && Usuario.Cidade != "" && Usuario.Permissao != "" && $("#Incial").val() != "")
    {
        Dados = JSON.stringify(Usuario);

        var Inicial = new FormData();
        Inicial.append('file', $('#Inicial')[0].files[0]);

        $.ajax({
            url : '../Controllers/Gerenciar.php?Controller=UsuarioController&Funcao=InserirInformacaoUsuario&Dados='+Dados,
            type : 'POST',
            data : Inicial,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success : function(ret) {
                if(ret == 1)
                {
                   window.open("../Controllers/Gerenciar.php?Controller=HomeController&Funcao=Redirecionar&Page=Inicio", "_self");
                }
                else
                {
                    return
                }
            }
        });
    }   
    else    
    {
        $("#Mensagem").html("");
        $("#Mensagem").append("<label>Insira todas as informações!</label>");
    }
});

// function AdiconarLinha(){

//     Cont = parseInt($("#Contator").val());

//     if(!(Cont >= 6)){
//         $("#Funcionamento").append("<br>"+
//             "<div class='row'>" +
//             "    <div class='col-md-5'>                      " +
//             "        <select id='Semana"+(Cont+1)+"' class='form-control' required='required'>" +
//             "        <option value='6'>Sabado</option>" +
//             "        <option value='1'>Segunda</option>" +
//             "        <option value='2'>Terça</option>" +
//             "        <option value='3'>Quarta</option>" +
//             "        <option value='4'>Quinta</option>" +
//             "        <option value='5'>Sexta</option>" +
//             "        <option value='6'>Domingo</option>" +
//             "        </select>                      " +
//             "    </div>" +
//             "    <div class='col-md-3'>" +
//             "        <select id='Hora_Inicio"+(Cont+1)+"' class='form-control' required='required'>" +
//             "        <option value='19:00'>19:00</option>" +
//             "        <option value='19:30'>19:30</option>" +
//             "        <option value='20:00'>20:00</option>" +
//             "        <option value='20:30'>20:30</option>" +
//             "        <option value='21:00'>21:00</option>" +
//             "        <option value='21:30'>21:30</option>" +
//             "        <option value='22:00'>22:00</option>" +
//             "        </select>" +
//             "    </div>" +
//             "    <div class='col-md-3'>" +
//             "        <select id='Hora_Fim"+(Cont+1)+"' class='form-control' required='required'>" +
//             "        <option value='19:00'>19:00</option>" +
//             "        <option value='19:30'>19:30</option>" +
//             "        <option value='20:00'>20:00</option>" +
//             "        <option value='20:30'>20:30</option>" +
//             "        <option value='21:00'>21:00</option>" +
//             "        <option value='21:30'>21:30</option>" +
//             "        <option value='22:00'>22:00</option>" +
//             "        </select>" +
//             "    </div>" +
//             "    <div class='col-md-1'>                        " +
//             "        <button type='button' class='btn btn-primary btnMais' onclick='AdiconarLinha()' id='BtnMais"+(Cont+1)+"'>+</button>                        " +
//             "    </div>" +
//             "</div>    ");

//         $("#BtnMais"+Cont).fadeOut();
//         $("#Contator").val(Cont+1);
//     }


// }

function Bloquear(Dia)
{
    Div = $("#DivFuncionamento" + Dia);                                     // Aqui pegamos a div que está com seus campo dentro

    if( Div.hasClass("Liberado") )                                          // Aqui verificamos se ela está bloqueada ou liberada
    {
        Div.css("pointer-events", "none");                                  // Aqui estamos desabilitando qualquer evento de cliques dentro dessa div (Exceto o botão)
        Div.css("opacity", "0.4");                                          // Aqui estamos deixando a div opaca, para dar a sensação de desabilitado 
        Div.removeClass("Liberado").addClass("Bloqueado");                  // Aqui estamos removendo a classe Liberada e colocando a Bloqueada
        
        $("#BtnDia" + Dia).html("Fechado");                                 // Aqui adionamos o texto 'Fechado ao seu botão'
        $("#BtnDia" + Dia).removeClass("btn-info").addClass("btn-danger");  // Aqui trocamos as classes do botão para mudar a cor
    }
    else
    {
        Div.css("pointer-events", "block");
        Div.css("opacity", "1");
        Div.removeClass("Bloqueado").addClass("Liberado");
        
        $("#BtnDia" + Dia).html("Aberto");
        $("#BtnDia" + Dia).removeClass("btn-danger").addClass("btn-info");
    }
}

$("#Inicial").change(function(){
    var Inicial = new FormData();
    Inicial.append('file', $('#Inicial')[0].files[0]);

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
                $("#ImagemInicial").fadeIn();
               $("#ImagemInicial").prop("src", ret);
            }
            else
            {
                return
            }
        }
    });
});