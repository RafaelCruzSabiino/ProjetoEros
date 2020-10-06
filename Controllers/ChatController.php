<?php
    /*<sumary>
        Essa pagina gerencia o chat do sistema.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"
    require_once("../Models/ChatModel.php");
    require_once("BaseController.php");
    require_once("../DAO/TB_PRJ_0012_DAO.php");
    #endregion

    class ChatController extends BaseController
    {
        public $DAO;
        public $Model;

        #region "Metodo Construtor"
        function __construct()
        {
            parent::__construct();
            $this->DAO      = new TB_PRJ_0012_DAO();
            $this->Model    = new ChatModel();
        }
        #endregion

        #region "Metodo para inserir o chat"
        function InserirMensagem()
        {
            $this->Model->setUsuario_1($_SESSION["DadosUser"]["Id"]);
            $this->Model->setUsuario_2($_POST["Usuario"]);
            $this->Model->setMensagem($_POST["Mensagem"]);

            $Verificacao = $this->BuscarChat($this->Model);

            if(empty($Verificacao))
            {
                $Chat = $this->DAO->InserirChat();

                if($Chat[0]["ID"] > 0)
                {
                    $this->Model->setId($Chat[0]["ID"]);
                    $this->Model->setDate("New");
                    $Definicao = $this->DAO->InserirDefinicao($this->Model);
                }
                else
                {
                    echo 0;
                }
            }
            else
            {
                $this->Model->setId($Verificacao[0]["CHAT"]);
                $this->Model->setDate("");
            }

            $ret = $this->DAO->InserirMensagem($this->Model);
            
            if($ret[0]["ID"] > 0)
            {
                echo json_encode($this->Model);
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Buscar Mensagem"
        function BuscarMensagem()
        {
            $this->Model->setId($_POST["Chat"]);

            $ret = $this->DAO->BuscarMensagem($this->Model);
            $Count = 0;

            foreach($ret as $Item)
            {
                if($Item["USUARIO"] != $_SESSION["DadosUser"]["Id"])
                {
                    $ret[$Count]["CLASS"] = "userDestino";
                    $ret[$Count]["STYLE"] = "color: red;";
                }
                else
                {
                    $ret[$Count]["CLASS"] = "userLogado";
                    $ret[$Count]["STYLE"] = "color: black; width: 50%; padding: 2%; margin-left: 1%; margin-right: 1%; margin-top: 1.5%; margin-bottom: 1.5%; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px;";
                }
                $Count++;
            }

            if(!empty($ret))
            {
                echo json_encode($ret);
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para buscar user e o id do chat"
        function BuscarUserChat()
        {
            require_once("UsuarioController.php");
            $UsuarioController = new UsuarioController();

            $this->Model->setUsuario_1($_SESSION["DadosUser"]["Id"]);
            $this->Model->setUsuario_2($_POST["Usuario"]);
            $Verificacao = $this->BuscarChat($this->Model);
            $InfoUser = $UsuarioController->BuscarUsuario(1);
            if(!empty($Verificacao))
            {
                $InfoUser["Chat"] = $Verificacao[0]["CHAT"];
            }
            else
            {
                $InfoUser["Chat"] = "";
            }

            echo json_encode($InfoUser);
        }
        #endregion

        #region "Metodo para buscar chat"
        function BuscarChat($Model)
        {
            $Verificacao = $this->DAO->VerificarChat($this->Model);
            return $Verificacao;
        }
        #endregion

        #region "Metodo para buscar pessoas chat"
        function BuscarPessoas()
        {
            require_once("UsuarioController.php");
            $UsuarioController = new UsuarioController();

            $ret = $this->DAO->BuscarPessoas($_SESSION["DadosUser"]["Id"]);
            $Lista = [];
            $Count = 0;

            foreach($ret as $Item)
            {
                if($Item["USUARIO_1"] != $_SESSION["DadosUser"]["Id"])
                {
                    $_POST["Usuario"] = $Item["USUARIO_1"];                    
                }
                else
                {
                    $_POST["Usuario"] = $Item["USUARIO_2"];
                }
                
                $InfoUser = $UsuarioController->BuscarUsuario(1);

                $Lista[$Count] = $InfoUser;

                $Count++;
            }

            echo json_encode($Lista);
        }
        #endregion

    }
?>