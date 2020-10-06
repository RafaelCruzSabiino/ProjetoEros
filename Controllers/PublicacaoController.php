<?php
    /*<sumary>
        Essa pagina gerencia as publicações.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"
    require_once("../Models/TB_PRJ_0008.php");
    require_once("BaseController.php");
    require_once("../DAO/TB_PRJ_0008_DAO.php");
    #endregion

    class PublicacaoController extends BaseController
    {
        public $DAO;
        public $Model;

        #region "Metodo Construtor"
        function __construct()
        {
            parent::__construct();
            $this->DAO      = new TB_PRJ_0008_DAO();
            $this->Model    = new TB_PRJ_0008();
        }
        #endregion

        #region "Metodo para inserir publicacao"
        function InserirPublicacao()
        {
            $this->Model = $this->Model->MapToClass($this->Model, $_POST);
            $this->Model->setUsuario($_SESSION["DadosUser"]["Id"]); 
            $this->Model->setImagemType($_FILES["Imagem"]["type"]);
            $this->Model->setImagemSize($_FILES["Imagem"]["size"]);
            $this->Model->setImagem(file_get_contents($_FILES["Imagem"]["tmp_name"]));
            
            $ret = $this->DAO->InserirPublicacao($this->Model);

            if($ret["Item"]->getId() > 0)
            {
                $this->Redirecionar($_GET["Pagina"]);
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para buscar publicacoes"
        function BuscarPublicacao()
        {
            $Usuario = $_POST["Usuario"] != "" ? $_POST["Usuario"] : $_SESSION["DadosUser"]["Id"];

            $this->Model->setContador($_POST["Contador"]);
            $this->Model->setUsuario($Usuario);

            if($_POST["Filtro"] != "Perfil")
            {
                $ret = $this->DAO->BuscarPublicacao($this->Model);
            }
            else
            {
                $ret = $this->DAO->BuscarExpecifica($this->Model);
            }
            
            if($ret[0]["ID"] > 0)
            {
                $Publicacao         = file_get_contents("../Views/PartialViews/Publicacao.html");
                $StrPublicacao      = "";
                $Count              = $_POST["Contador"];

                foreach($ret as $Item)
                {
                    $Curtidas       = $this->DAO->BuscarCurtida($Item["ID"]);
                    $Verificacao    = $this->DAO->VerificarCurtida($Item["ID"], $_SESSION["DadosUser"]["Id"]);
                    if(!empty($Verificacao))
                    {
                        $Verificacao = "fa fa-heart";
                    }
                    else
                    {
                        $Verificacao = "fa fa-heart-o";
                    }

                    $Info           = array(
                                        "Id"                    => $Item["ID"]
                                        , "Empresa"             => $Item["EMPRESA"]
                                        , "Abreviacao"          => $Item["ABREVIACAO"]
                                        , "Imagem"              => "data:image/png;base64,".base64_encode($Item["IMAGEM"])
                                        , "Date"                => $Item["DATE"]
                                        , "Texto"               => $Item["TEXTO"]
                                        , "Link"                => $Item["LINK"]
                                    );
                    $StrPublicacao .=   str_replace("ABREVIACAO", $Info["Abreviacao"], 
                                        str_replace("DATA", $Info["Date"], 
                                        str_replace("IMAGEM2", $Info["Imagem"], 
                                        str_replace("TEXTO", $Info["Texto"], 
                                        str_replace("LINK", $Info["Link"], 
                                        str_replace("EMPRESA", $Info["Empresa"], 
                                        str_replace("ID", $Info["Id"], 
                                        str_replace("CURTIDA", $Curtidas, 
                                        str_replace("CLASSE", $Verificacao, 
                                        str_replace("COUNT", "Curtida".$Count, 
                                        str_replace("CONTADOR", $Count, $Publicacao)))))))))));
                
                    $Count++;
                }

                echo json_encode($StrPublicacao);
            }

        }
        #endregion

        #region "Metodo para curtir publicação"
        function Curtir()
        {
            $Verificacao = $this->DAO->VerificarDesativa($_SESSION["DadosUser"]["Id"], $_POST["Publicacao"]);

            if(!empty($Verificacao))
            {
                $ret = $this->DAO->InserirCurtidaNovamente($_SESSION["DadosUser"]["Id"], $_POST["Publicacao"]);

                if($ret > 0)
                {
                    $Curtidas = $this->DAO->BuscarCurtida($_POST["Publicacao"]);
                    echo $Curtidas;
                }
                else
                {
                    echo "Erro";
                }
            }
            else
            {

                $ret = $this->DAO->Curtir($_SESSION["DadosUser"]["Id"], $_POST["Publicacao"]);

                if($ret[0]["ID"] > 0)
                {
                    $Curtidas = $this->DAO->BuscarCurtida($_POST["Publicacao"]);
                    echo $Curtidas;
                }
                else
                {
                    echo "Erro";
                }
            }
        }
        #endregion

        #region "Metodo pra Descurtir"
        function Descurtir()
        {
            $ret = $this->DAO->Descurtir($_SESSION["DadosUser"]["Id"], $_POST["Publicacao"]);

            if($ret > 0)
            {
                $Curtidas = $this->DAO->BuscarCurtida($_POST["Publicacao"]);
                echo $Curtidas;
            }
            else
            {
                echo "Erro";
            }
        }
        #endregion

        #region "Metodo para inserir publicacao"
        function InsertComentario()
        {
            $ret =  $this->DAO->InserirComentario($_POST["Publicacao"], $_SESSION["DadosUser"]["Id"], $_POST["Texto"]);

            if($ret[0]["ID"] > 0)
            {
                echo 1;
            }   
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para buscar comentario"
        function BuscarComentario()
        {
            $ret = $this->DAO->BuscarComentario($_POST["Publicacao"], $_POST["Limitador"]);

            if(!empty($ret))
            {
                $Count = 0;
                foreach($ret as $Item)
                {
                    $ret[$Count]["INICIAL"] = base64_encode($Item["INICIAL"]);
                    $Count++;
                }
                echo json_encode($ret);
            }
            else
            {
                echo 0;
            }
        }
        #endregion
    }
?>