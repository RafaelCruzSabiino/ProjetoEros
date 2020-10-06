$(document).ready(function(){
    var FiltroUsuario = "Todos";
    $("#BtnDepois").css({display: "none"});
    $("#BtnCancelar").css({display: "none"});
    $.post(
        "../Controllers/Gerenciar.php?Controller=UsuarioController&Funcao=BuscarUsuarioSession",{
            FiltroUsuario: FiltroUsuario
        },function(data){
            if(data != 0){
                Info = JSON.parse(data);
                $("#Nome").val(Info.Nome);
                $("#Abreviacao").val(Info.Abreviacao);
                $("#DataNascimento").val(Info.DataNascimento);
                $("#EmailPessoal").val(Info.EmailPessoal);
                $("#Email").val(Info.Email);
                $("#Senha").val(Info.Senha);
                $("#Sexo").val(Info.Sexo);
                $("#Cnpj").val(Info.Cnpj);
                $("#Status").val(Info.Status);
                $("#Observacao").val(Info.Observacao);
                $("#Permissao").val(Info.Permissao);
                $("#TopoPost").val(Info.Topo);
                $("#TopoSize").val(Info.TopoSize);
                $("#TopoType").val(Info.TopoType);
                $("#InicialPost").val(Info.Inicial);
                $("#InicialSize").val(Info.InicialSize);
                $("#InicialType").val(Info.InicialType);
                $("#Perfil").val(Info.Perfil);
                $("#Endereco").val(Info.Endereco);
                $("#ImagemInicial").prop("src", "data:image/png;base64,"+Info.Inicial);
                $("#ImagemTopo").prop("src", "data:image/png;base64,"+Info.Topo);
            }else{
                alert("Erro");
            }
        }
    );
});

$("#BtnAntes").click(function(){
    $("#BtnAntes").css({display: "none"});
    $("#BtnDepois").css({display: "block"});
    $("#BtnCancelar").css({display: "block"});
    $("#Nome").prop("disabled", false);
    $("#Abreviacao").prop("disabled", false);
    $("#DataNascimento").prop("disabled", false);
    $("#Email").prop("disabled", false);
    $("#Senha").prop("disabled", false);
    $("#Sexo").prop("disabled", false);
    $("#Cnpj").prop("disabled", false);
    $("#Status").prop("disabled", false);
    $("#Permissao").prop("disabled", false);
    $("#Observacao").prop("disabled", false);
    $("#Inicial").prop("disabled", false);
    $("#Topo").prop("disabled", false);
    $("#EmailPessoal").prop("disabled", false);
});

$("#BtnCancelar").click(function(){
    location.reload();
});

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
               $("#ImagemInicial").prop("src", ret);
            }
            else
            {
                return
            }
        }
    });
});