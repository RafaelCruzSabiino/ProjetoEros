$(document).ready(function(){
    $("#Enviar").css({display: "none"});
    $("#Enviar2").css({display: "none"});
});

$("#Comum, #Empresa").click(function(e){
    Campo = e.target.id;
    if(Campo == "Comum"){
      $("#register").css({display: "block"});
      $("#register_2").css({display: "none"});
    }else{
      $("#register").css({display: "none"});
      $("#register_2").css({display: "block"});
    }
});

$("#Confirme").keyup(function(Dados){
    Valor = Dados.target.value;
    if($("#Senha").val() != Valor)
    {
        $("#RetornarSenha").html("");
        $("#RetornarSenha").append("<p>As senhas estão incorretas</p>");
        $("#Enviar").css({display: "none"});
        return;
    }
    else
    {
        $("#RetornarSenha").html("");
        $("#Enviar").css({display: "block"});
        return;
    }
});

$("#Confirme2").keyup(function(Dados){
    Valor = Dados.target.value;
    if($("#Senha2").val() != Valor)
    {
        $("#RetornarSenha2").html("");
        $("#RetornarSenha2").append("<p>As senhas estão incorretas</p>");
        $("#Enviar2").css({display: "none"});
        return;
    }
    else
    {
        $("#RetornarSenha2").html("");
        $("#Enviar2").css({display: "block"});
        return;
    }
});



