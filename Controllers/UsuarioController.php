<?php
    /*<sumary>
        Essa pagina gerencia todas as funções do usuario
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"
    require_once("../Models/TB_PRJ_0001.php");
    require_once("BaseController.php");
    require_once("../DAO/TB_PRJ_0001_DAO.php");
    #endregion

    class UsuarioController extends BaseController
    {
        public $DAO;

        #region "Metodo construtor"
        function __construct()
        {
            parent::__construct();
            $this->DAO = new TB_PRJ_0001_DAO();
        }
        #endregion

        #region "Metodo para inserir restante de informações Usuario"
        function InserirInformacaoUsuario()
        {
            require_once("../Models/TB_PRJ_0002.php");
            require_once("../Models/TB_PRJ_0004.php");
            require_once("../DAO/TB_PRJ_0002_DAO.php");
            require_once("../DAO/TB_PRJ_0004_DAO.php");
            
            $Dados = json_decode($_GET["Dados"]);

            $TB_PRJ_0002 = new TB_PRJ_0002();
            $TB_PRJ_0002->setInicialType($_FILES['file']['type']);
            $TB_PRJ_0002->setInicialSize($_FILES['file']['size']);
            $TB_PRJ_0002->setInicial(file_get_contents($_FILES['file']['tmp_name']));

            $TB_PRJ_0002_DAO = new TB_PRJ_0002_DAO();
            $perfil = $TB_PRJ_0002_DAO->InserirPerfil($TB_PRJ_0002);

            if($perfil['Item']->getId() > 0)
            {
                $TB_PRJ_0004 = new TB_PRJ_0004();
                $TB_PRJ_0004->setCidade($Dados->Cidade);
                $TB_PRJ_0004_DAO = new TB_PRJ_0004_DAO();
                $endereco = $TB_PRJ_0004_DAO->InserirEndereco($TB_PRJ_0004);

                if($endereco['Item']->getId() > 0)
                {
                    if($_SESSION["DadosUser"]["Tipo"] == "PJ")
                    {
                        foreach($Dados->DiasTrabalhados as $Item)
                        {
                            if(!empty($Item)){
                                $DataTrabalhada = $this->DAO->InserirData($_SESSION["DadosUser"]["Id"], $Item->Dia, $Item->Inicio, $Item->Fim);
                            }
                        }
                    }
                    $Dados->Id          = $_SESSION["DadosUser"]["Id"];
                    $Dados->Endereco    = $endereco['Item']->getId();
                    $Dados->Perfil      = $perfil['Item']->getId();
                    $TB_PRJ_0001        = new TB_PRJ_0001();
                    $TB_PRJ_0001        = $TB_PRJ_0001->MapToClass($TB_PRJ_0001, $Dados, 1);

                    $ret = $this->DAO->InserirInformacaoUsuario($TB_PRJ_0001);
                    
                    if($ret['RowCount'] > 0)
                    {
                        
                        $FiltroUsuario = "Iniciais";
                        $this->BuscarUsuarioSession($FiltroUsuario);
                        echo 1;
                    }
                    else
                    {
                        echo 0;
                    }
                }
                else
                {
                    echo 0;
                }
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para buscar o usuario"
        function BuscarUsuarioSession($Filtro="")
        {

            require_once("HomeController.php");
            $HomeController = new HomeController();

            $ret = $this->DAO->BuscarUsuario($_SESSION["DadosUser"]['Id']);

            $Filtro = $Filtro != "" ? $Filtro : $_POST['FiltroUsuario'];

            if($ret[0]['ID'] > 0)
            {
                $_POST["Imagem"]                            = $ret[0]["INICIAL"];

                #region "So for os dados inciais do usuario, ou seja, vindo do Login ou Cadastro"
                if($Filtro == "Iniciais"){
                    $_SESSION["DadosUser"]['Nome']          = $ret[0]["NOME"];
                    $_SESSION["DadosUser"]['Inicial']       = $HomeController->ImageToBase64();
                    $_SESSION["DadosUser"]['Abreviacao']    = $ret[0]["ABREVIACAO"];
                }
                #endregion
                #region "Se for todos os dados do usuario"
                else if($Filtro == "Todos")
                {
                    $Info = array(
                        "Nome"              => $ret[0]["NOME"], 
                        "Abreviacao"        => $ret[0]["ABREVIACAO"],
                        "Inicial"           => $HomeController->ImageToBase64(),
                        "DataNascimento"    => $ret[0]["DATA_NASCIMENTO"],
                        "EmailPessoal"      => $ret[0]["EMAIL_PESSOAL"],
                        "Email"             => $ret[0]["EMAIL"],
                        "Senha"             => $ret[0]["SENHA"],
                        "Sexo"              => $ret[0]["SEXO"],
                        "Cnpj"              => $ret[0]["CNPJ"],
                        "Status"            => $ret[0]["STATUS"],
                        "Observacao"        => $ret[0]["OBSERVACAO"],
                        "Permissao"         => $ret[0]["PERMISSAO"],
                        "InicialType"       => $ret[0]["INICIAL_TYPE"],
                        "InicialSize"       => $ret[0]["INICIAL_SIZE"],
                        "Permissao"         => $ret[0]["PERMISSAO"],
                        "Perfil"            => $ret[0]["PERFIL"],
                        "Endereco"          => $ret[0]["ENDERECO"]
                    );
                    
                    echo json_encode($Info);
                }
                #endregion
                else
                {
                    echo 0;
                }
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para buscar usuario amigo"
        function BuscarUsuario($Chat="")
        {
            if($_POST)
            {
                $ret = $this->DAO->BuscarUsuario($_POST["Usuario"]);
            }

            if($ret[0]["ID"] > 0)
            {
                // if($ret[0]["PERMISSAO"] == "Amigos")
                // {
                //     $Info = "";
                // }
                // else
                // {
                    $Info = array(
                        "Id"                => $ret[0]["ID"],
                        "Nome"              => $ret[0]["NOME"], 
                        "Abreviacao"        => $ret[0]["ABREVIACAO"],
                        "Inicial"           => base64_encode($ret[0]["INICIAL"]),
                        "DataNascimento"    => $ret[0]["DATA_NASCIMENTO"],
                        "EmailPessoal"      => $ret[0]["EMAIL_PESSOAL"],
                        "Email"             => $ret[0]["EMAIL"],
                        "Senha"             => $ret[0]["SENHA"],
                        "Sexo"              => $ret[0]["SEXO"],
                        "Cnpj"              => $ret[0]["CNPJ"],
                        "Status"            => $ret[0]["STATUS"],
                        "Observacao"        => $ret[0]["OBSERVACAO"],
                        "Permissao"         => $ret[0]["PERMISSAO"],
                        "InicialType"       => $ret[0]["INICIAL_TYPE"],
                        "InicialSize"       => $ret[0]["INICIAL_SIZE"],
                        "Permissao"         => $ret[0]["PERMISSAO"],
                        "Perfil"            => $ret[0]["PERFIL"],
                        "Endereco"          => $ret[0]["ENDERECO"]
                    );
                // }

                if($Chat == "")
                {
                    echo json_encode($Info);
                }
                else
                {
                    return $Info;
                }
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para buscar usuario em lista"
        function BuscarUsuarioLista()
        {
            $ret = $this->DAO->BuscarUsuarioLista($_POST["Procurar"]);

            if(!empty($ret))
            {
                $i = 0;
                foreach($ret as $Item)
                {
                    $ret[$i]["INICIAL"] = base64_encode($Item["INICIAL"]);
                    $i++;
                }

                echo json_encode($ret);
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para alterar informações Usuario"
        function AlterarUsuario()
        {
            require_once("../Models/TB_PRJ_0002.php");
            require_once("../Models/TB_PRJ_0004.php");
            require_once("../DAO/TB_PRJ_0002_DAO.php");
            require_once("../DAO/TB_PRJ_0004_DAO.php");

            $TB_PRJ_0001 = new TB_PRJ_0001();
            $TB_PRJ_0001 = $TB_PRJ_0001->MapToClass($TB_PRJ_0001, $_POST);
            $TB_PRJ_0001->setId($_SESSION["DadosUser"]["Id"]);
            $TB_PRJ_0001->setCriptografia(md5($_POST["Senha"]));
            
            $ret = $this->DAO->AlterarUsuario($TB_PRJ_0001);

            $_SESSION["DadosUser"]["Nome"] = $TB_PRJ_0001->getNome();
            $_SESSION["DadosUser"]["Abreviacao"] = $TB_PRJ_0001->getAbreviacao();

            $TB_PRJ_0002 = new TB_PRJ_0002();
            $TB_PRJ_0002 = $TB_PRJ_0002->MapToClass($TB_PRJ_0002, $_POST);
            $TB_PRJ_0002->setId($_POST["Perfil"]);
            $TB_PRJ_0002->setInicial(base64_decode($_POST["Inicial"]));   
    
            if(!empty($_FILES["InicialFile"]["tmp_name"]))
            {
                $TB_PRJ_0002->setInicialType($_FILES["InicialFile"]["type"]);
                $TB_PRJ_0002->setInicialSize($_FILES["InicialFile"]["size"]);
                $TB_PRJ_0002->setInicial(file_get_contents($_FILES["InicialFile"]["tmp_name"]));
            }
    
            $TB_PRJ_0002_DAO = new TB_PRJ_0002_DAO();
            $AlterarPerfil = $TB_PRJ_0002_DAO->AlterarPerfil($TB_PRJ_0002);
            $_SESSION["DadosUser"]["Inicial"] = base64_encode($TB_PRJ_0002->getInicial());

            $this->Redirecionar("Perfil");
        }
    #endregion
    }

?>