<?php
    /*<sumary>
        Essa pagina gerencia as entradas nos estabelecimentos.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"
    require_once("BaseController.php");
    require_once("../DAO/TB_PRJ_0015_DAO.php");
    #endregion

    class EntrarController extends BaseController
    {
        public $DAO;

        #region "Metodo Construtor"
        function __construct()
        {
            parent::__construct();
            $this->DAO      = new TB_PRJ_0015_DAO();
        }
        #endregion

        #region "Metodo para buscar a balada de acordo com a cidade e a hora"
        function BuscarBalada()
        {

            $Verificacao = $this->DAO->VerificarAtivo($_SESSION["DadosUser"]["Id"]);

            if(!empty($Verificacao))
            {
                $_SESSION["Ativacao"]["Status"]     = "ATIVO";
                $_SESSION["Ativacao"]["IdAtivacao"] = $Verificacao[0]["ID"];
                $_SESSION["Ativacao"]["Id"]         = $Verificacao[0]["EMPRESA"];
                echo 1;
            }
            else
            {
                $InfoBusca = array(
                                "Usuario"   => $_SESSION["DadosUser"]["Id"]
                                ,"Dia"      => date('w', strtotime(gmdate("Y/m/d", time()-((9*60)*60))))
                                ,"Hora"      => gmdate("H:i:s", time()-((3*60)*60))
                                ,"Procurar" => $_POST["Procurar"]
                            );

                if($_POST["Procurar"] != "")
                {
                    $ret = $this->DAO->BuscarBaladaLista($InfoBusca);
                }
                else
                {
                    $ret = $this->DAO->BuscarBalada($InfoBusca);
                }

                if(!empty($ret))
                {
                    $Entrar     = file_get_contents("../Views/PartialViews/Entrar.html");
                    $StrEntrar  = "";
                    $ALinha = "<br><div class='row'>";
                    $FLinha = "</div>";
                    $Cont   = 0;

                    foreach($ret as $Item)
                    {                        
                        if($Cont == 0)
                        {
                            $StrEntrar .= $ALinha;
                        }                        

                        $Pessoas            = $this->DAO->BuscarPessoas($Item["ID"]);
                        $Item["RowPessoas"] = $Pessoas["RowCount"];

                        $Info           = array(
                                            "Id"            => $Item["ID"]
                                            , "Inicial"     => "data:image/png;base64,".base64_encode($Item["INICIAL"])
                                            , "Abreviacao"  => $Item["ABREVIACAO"]
                                            , "Pessoas"     => $Item["RowPessoas"]
                                        );
                        $StrEntrar .= str_replace("ABREVIACAO", $Info["Abreviacao"], str_replace("IMAGEM", $Info["Inicial"], str_replace("IDBALADA", $Info["Id"], str_replace("PESSOAS", $Info["Pessoas"], $Entrar))));

                        $Cont++;

                        if($Cont == 2)
                        {
                            $Cont       = 0;
                            $StrEntrar  .= "</div>";
                        }
                        
                    }

                    echo $StrEntrar;
                }
                else
                {
                    echo 0;
                }
            }
        }
        #endregion

        #region "Metodo para entrar na balada"
        function IngressarBalada()
        {
            $InfoBusca = array(
                            "Empresa" => $_GET["Id"]
                            ,"Usuario"  => $_SESSION["DadosUser"]["Id"]
                        );

            $ret = $this->DAO->IngressarBalada($InfoBusca);
                
            if($ret[0]["ID"] > 0)
            {
                $_SESSION["Ativacao"]["Status"]     = "ATIVO";
                $_SESSION["Ativacao"]["IdAtivacao"] = $ret[0]["ID"];
                $_SESSION["Ativacao"]["Id"]         = $_GET["Id"];
                $this->Redirecionar("Balada");
            }
            else
            {
                echo 0;
            }
        }
        #endregion

        #region "Metodo para sair da balada"
        function SairBalada()
        {

            $ret = $this->DAO->SairBalada($_SESSION["Ativacao"]["IdAtivacao"]);

            if($ret > 0)
            {
                $_SESSION["Ativacao"]["Status"]     = "DESATIVADO";
                $_SESSION["Ativacao"]["IdAtivacao"] = 0;
                $_SESSION["Ativacao"]["Id"]         = 0;
                $this->Redirecionar("Entrar");
            }
            else
            {
                return 0;
            }
        }
        #endregion

        #region "Metodo para buscar Pessoas"
        function BuscarPessoas()
        {
            if($_POST["Procurar"] != "")
            {
                $ret = $this->DAO->BuscarPessoasLista($_SESSION["Ativacao"]["Id"], $_SESSION["DadosUser"]["Id"], $_POST["Procurar"]);
            }
            else
            {
                $ret = $this->DAO->BuscarPessoas($_SESSION["Ativacao"]["Id"], $_SESSION["DadosUser"]["Id"]);
            }

            if($ret["RowCount"] > 0)
            {
                $Balada     = file_get_contents("../Views/PartialViews/Balada.html");
                $StrBalada  = "";
                $ALinha = "<br><div class='row'>";
                $FLinha = "</div>";
                $Cont   = 0;

                foreach($ret["Item"] as $Item)
                {
                    if($Cont == 0)
                    {
                        $StrBalada .= $ALinha;
                    }  

                    $Info           = array(
                                        "Id"            => $Item["ID"]
                                        , "Inicial"     => "data:image/png;base64,".base64_encode($Item["INICIAL"])
                                        , "Abreviacao"  => $Item["ABREVIACAO"]
                                    );
                    $StrBalada .= str_replace("ABREVIACAO", $Info["Abreviacao"], str_replace("IMAGEM", $Info["Inicial"], str_replace("ID", $Info["Id"], $Balada)));

                    $Cont++;

                    if($Cont == 3)
                    {
                        $Cont       = 0;
                        $StrBalada  .= "</div>";
                    }
                }

                echo json_encode($StrBalada);
            }
            else
            {
                echo 0;
            }
        }
        #endregion
    }
    
?>