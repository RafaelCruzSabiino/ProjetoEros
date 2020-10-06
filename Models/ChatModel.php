<?php
    /*<sumary>
        Modelo referente a tabela TB_PRJ_0012 e TB_PRJ_0011 E TB_PRJ_0016.
    </sumary>*/

    require_once("BaseClass.php");

    class ChatModel extends BaseClass
    {
        #region "Propriedades"
        public $Id;
        public $Usuario_1;
        public $Usuario_2;
        public $Usuario;
        public $Nome;
        public $Abreviacao;
        public $Inicial;
        public $Mensagem;
        public $Date;
        #endregion

        #region "Construtor"
        public function __construct($Id="",$Usuario_1="",$Usuario_2="",$Usuario="",$Nome="",$Abreviacao="",$Inicial="",$Mensagem="",$Date="")
        {
            $this->Id           = $Id;
            $this->Usuario_1    = $Usuario_1;
            $this->Usuario_2    = $Usuario_2;
            $this->Usuario      = $Usuario;
            $this->Nome         = $Nome;
            $this->Abreviacao   = $Abreviacao;
            $this->Inicial      = $Inicial;
            $this->Mensagem     = $Mensagem;
            $this->Date         = $Date;
            parent::__construct();
        }
        #endregion

        #region "Metodos Get"
        public function getId()         {   return $this->Id;           }
        public function getUsuario_1()  {   return $this->Usuario_1;    }
        public function getUsuario_2()  {   return $this->Usuario_2;    }
        public function getUsuario()    {   return $this->Usuario;      }
        public function getNome()       {   return $this->Nome;         }
        public function getAbreviacao() {   return $this->Abreviacao;   }
        public function getInicial()    {   return $this->Inicial;      }
        public function getMensagem()   {   return $this->Mensagem;     }
        public function getDate()       {   return $this->Date;         }
        #endregion

        #region "Metodos Set"
        public function setId($Id)                  {   $this->Id           = $Id;          }
        public function setUsuario_1($Usuario_1)    {   $this->Usuario_1    = $Usuario_1;   }
        public function setUsuario_2($Usuario_2)    {   $this->Usuario_2    = $Usuario_2;   }
        public function setUsuario($Usuario)        {   $this->Usuario      = $Usuario;     }
        public function setNome($Nome)              {   $this->Nome         = $Nome;        }
        public function setAbreviacao($Abreviacao)  {   $this->Abreviacao   = $Abreviacao;  }
        public function setInicial($Inicial)        {   $this->Inicial      = $Inicial;     }
        public function setMensagem($Mensagem)      {   $this->Mensagem     = $Mensagem;    }
        public function setDate($Date)              {   $this->Date         = $Date;        }
        #endregion

        #region "Dicionário da classe"
        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "ID"         , "IndiceClass" => "Id"         ]
                , ["IndiceBase" => "USUARIO_1"  , "IndiceClass" => "Usuario_1"  ]
                , ["IndiceBase" => "USUARIO_2"  , "IndiceClass" => "Usuario_2"  ]
                , ["IndiceBase" => "USUARIO"    , "IndiceClass" => "Usuario"    ]
                , ["IndiceBase" => "NOME"       , "IndiceClass" => "Nome"       ]
                , ["IndiceBase" => "ABREVIACAO" , "IndiceClass" => "Abreviacao" ]
                , ["IndiceBase" => "INICIAL"    , "IndiceClass" => "Inicial"    ]
                , ["IndiceBase" => "MENSAGEM"   , "IndiceClass" => "Mensagem"   ]
                , ["IndiceBase" => "DATE"       , "IndiceClass" => "Date"       ]
            );
        }
        #endregion
    }

?>