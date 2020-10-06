<?php
    /*<sumary>
        Essa pagina gerencia o rediregionamento para as paginas e a validação do Login.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"
    require_once("../Models/TB_PRJ_0001.php");
    require_once("BaseController.php");
    require_once("../DAO/TB_PRJ_0001_DAO.php");
    #endregion

    class HomeController extends BaseController
    {
        public $DAO;

        #region "Metodo Construtor"
        function __construct()
        {
            parent::__construct();
            $this->DAO = new TB_PRJ_0001_DAO();
        }
        #endregion

        #region "Metodo para validar o login"
        function ValidarLogin()
        {

            $_POST["Login"] = $this->AntiSqlInjector($_POST["Login"]);
            $_POST["Criptografia"] = md5($this->AntiSqlInjector($_POST["Criptografia"]));

            $TB_PRJ_0001 = new TB_PRJ_0001();
            $TB_PRJ_0001 = $TB_PRJ_0001->MapToClass($TB_PRJ_0001, $_POST);

            $ret = $this->DAO->ValidarLogin($TB_PRJ_0001);

            if($ret["RowCount"] > 0)
            {
                $_SESSION["DadosUser"]["Id"]    = $ret["Item"]->getId();
                $_SESSION["DadosUser"]["Tipo"]  = $ret["Item"]->getTipo();
                $_SESSION["Ativacao"]["Status"] = "DESATIVADO";
                $this->BuscarEstados();

                if($ret["Item"]->getPerfil() == "")
                {
                    $this->Redirecionar("Cadastro");
                }
                else
                {
                    require_once("UsuarioController.php");
                    $UsuarioController = new UsuarioController();
                    $UsuarioController->BuscarUsuarioSession('Iniciais');
                    $this->Redirecionar("Inicio");
                }
            }
            else
            {
                $this->Redirecionar("Login");
            }
        }
        #endregion 

        #region "Metodo para cadastrar usuario"
        public function InserirUsuario()
        {
            $_POST["Criptografia"] = md5($_POST["Senha"]);
            $TB_PRJ_0001 = new TB_PRJ_0001();
            $TB_PRJ_0001 = $TB_PRJ_0001->MapToClass($TB_PRJ_0001, $_POST);
        
            $ret = $this->DAO->InserirUsuario($TB_PRJ_0001);
        
            if($ret["Item"]->getId() > 0)
            {
                $_SESSION["DadosUser"]["Id"]    = $ret["Item"]->getId();
                $_SESSION["DadosUser"]["Tipo"]  = $TB_PRJ_0001->getTipo();
                $_SESSION["Ativacao"]["Status"] = "DESATIVADO";
                $this->BuscarEstados();
                $this->Redirecionar("Cadastro");
            }
            else
            {
                $this->Redirecionar("Login");
            }
        
        }
        #endregion

        #region "Metodo para Buscar Estados"
        function BuscarEstados()
        {
            $ret = $this->DAO->BuscarEstados();

            if($ret)
            {
                $Option         = file_get_contents("../Views/PartialViews/OptionEstados.html");
                $StrEstados     = "";

                foreach($ret as $Item)
                {
                    $StrEstados .= str_replace("VALOR", $Item["ID"], str_replace("TEXTO", $Item["UF"], $Option));
                }

                echo $_SESSION["Estados"] = json_encode($StrEstados);
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para buscar cidade conforme o estado"
        function BuscarCidades()
        {
            $ret = $this->DAO->BuscarCidades($_POST["Estado"]);

            if($ret)
            {
                $Option         = file_get_contents("../Views/PartialViews/OptionEstados.html");
                $StrCidades     = "";

                foreach($ret as $Item)
                {
                    $StrCidades .= str_replace("VALOR", $Item["ID"], str_replace("TEXTO", $Item["NOME"], $Option));
                }
                
                echo json_encode($StrCidades);
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para encodar a imagem"
        function ImageToImage()
        {
            $Imagem = "data:image/".$_FILES["file"]["type"].";base64,".base64_encode(file_get_contents($_FILES["file"]["tmp_name"]));
            echo $Imagem;
        }
        #endregion

        #region "Metodo para encodar imagem"       
        function ImageToBase64()
        {
            $Imagem = base64_encode($_POST["Imagem"]);
            return $Imagem;
        }
        #endregion

        #region "Metodo para fazer o logout do usuario"
        function LogOut()
        {
            session_reset();
            session_destroy();
            $this->Redirecionar("Login");
        }
        #endregion

    }

?>