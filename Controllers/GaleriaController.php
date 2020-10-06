<?php
    /*<sumary>
        Essa controller gerencia a galeria de fotos do usuario.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"
    require_once("../Models/TB_PRJ_0003.php");
    require_once("BaseController.php");
    require_once("../DAO/TB_PRJ_0003_DAO.php");
    #endregion

    class GaleriaController extends BaseController
    {
        public $DAO;
        public $Model;

        #region "Metodo Construtor"
        function __construct()
        {
            parent::__construct();
            $this->DAO      = new TB_PRJ_0003_DAO();
            $this->Model    = new TB_PRJ_0003(); 
        }
        #endregion

        #region "Metodo para inserir galeria"
        function InserirGaleria()
        {
            $this->Model->setUsuario    ($_SESSION["DadosUser"]["Id"]);
            $this->Model->setImagemType ($_FILES["Imagem"]["type"]);
            $this->Model->setImagemSize ($_FILES["Imagem"]["size"]);
            $this->Model->setImagem     (file_get_contents($_FILES["Imagem"]["tmp_name"]));
            $this->Model->setLegenda    ($_POST["Legenda"]);

            $ret = $this->DAO->InserirGaleria($this->Model);

            if($ret["Item"]->getId() > 0)
            {
                $this->Redirecionar("Perfil");
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para Buscar Usuario"
        function BuscarGaleria()
        {
            $Usuario = $_POST["Usuario"] != "" ? $_POST["Usuario"] : $_SESSION["DadosUser"]["Id"];

            $this->Model->setUsuario($Usuario);

            $ret = $this->DAO->BuscarGaleria($this->Model);

            if($ret[0]["ID"] > 0)
            {
                $Galeria         = file_get_contents("../Views/PartialViews/Imagem.html");
                $StrGaleria      = "";

                foreach($ret as $Item)
                {
                    $StrGaleria .= str_replace("IMAGEM", "data:image/png;base64,".base64_encode($Item["IMAGEM"]), str_replace("ID", $Item["ID"], $Galeria));
                }

                echo json_encode($StrGaleria);
            }
            else
            {
                echo 0;
            }
        }
        #endregion
    }
?>