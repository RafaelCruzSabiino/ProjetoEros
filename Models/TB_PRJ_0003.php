<?php
    /*<sumary>
        Essa pagina gerencia a tabela TB_PRJ_0003
    </sumary>*/

    require_once("BaseClass.php");

    class TB_PRJ_0003 extends BaseClass
    {
        #region "Propriedades"
        public $Id;
        public $Usuario;
        public $ImagemType;
        public $ImagemSize;
        public $Imagem;
        public $Legenda;
        public $Date;
        #endregion

        #region "Construtor"
        public function __construct($Id="",$Usuario="",$ImagemType="",$ImagemSize="",$Imagem="",$Legenda="",$Date="")
        {
            $this->Id           = $Id;
            $this->Usuario      = $Usuario;
            $this->ImagemType   = $ImagemType;
            $this->ImagemSize   = $ImagemSize;
            $this->Imagem       = $Imagem;
            $this->Legenda      = $Legenda;
            $this->Date         = $Date;
            parent::__construct();
        }
        #endregion

        #region "Metodos Get"
        public function getId()             {   return $this->Id;           }
        public function getUsuario()        {   return $this->Usuario;      }
        public function getImagemType()     {   return $this->ImagemType;   }
        public function getImagemSize()     {   return $this->ImagemSize;   }
        public function getImagem()         {   return $this->Imagem;       }
        public function getLegenda()        {   return $this->Legenda;      }
        public function getDate()           {   return $this->Date;         }
        #endregion

        #region "Metodos Set"
        public function setId($Id)                  {   $this->Id           = $Id;          }
        public function setUsuario($Usuario)        {   $this->Usuario      = $Usuario;     }
        public function setImagemType($ImagemType)  {   $this->ImagemType   = $ImagemType;  }
        public function setImagemSize($ImagemSize)  {   $this->ImagemSize   = $ImagemSize;  }
        public function setImagem($Imagem)          {   $this->Imagem       = $Imagem;      }
        public function setLegenda($Legenda)        {   $this->Legenda      = $Legenda;     }
        public function setDate($Date)              {   $this->Date         = $Date;        }
        #endregion

        #region "Dicionário da classe"
        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "ID"             , "IndiceClass" => "Id"             ]
                , ["IndiceBase" => "USUARIO"        , "IndiceClass" => "Usuario"        ]
                , ["IndiceBase" => "IMAGEM_TYPE"    , "IndiceClass" => "ImagemType"     ]
                , ["IndiceBase" => "IMAGEM_SIZE"    , "IndiceClass" => "ImagemSize"     ]
                , ["IndiceBase" => "IMAGEM"         , "IndiceClass" => "Imagem"         ]
                , ["IndiceBase" => "LEGENDA"        , "IndiceClass" => "Legenda"        ]
                , ["IndiceBase" => "DATE"           , "IndiceClass" => "Date"           ]
            );
        }
        #endregion
    }

?>