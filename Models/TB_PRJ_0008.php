<?php
    /*<sumary>
        Essa pagina gerencia a tabela TB_PRJ_0008
    </sumary>*/

    require_once("BaseClass.php");

    class TB_PRJ_0008 extends BaseClass
    {
        #region "Propriedades"
        public $Id;
        public $Usuario;
        public $ImagemType;
        public $ImagemSize;
        public $Imagem;
        public $Texto;
        public $Link;
        public $Date;
        public $Contador;
        #endregion

        #region "Construtor"
        public function __construct($Id="",$Usuario="",$ImagemType="",$ImagemSize="",$Imagem="",$Texto="", $Link="",$Date="", $Contador="")
        {
            $this->Id           = $Id;
            $this->Usuario      = $Usuario;
            $this->ImagemType   = $ImagemType;
            $this->ImagemSize   = $ImagemSize;
            $this->Imagem       = $Imagem;
            $this->Texto        = $Texto;
            $this->Link         = $Link;
            $this->Date         = $Date;  
            $this->Contador     = $Contador;
            parent::__construct();
        }
        #endregion

        #region "Metodos Get"
        public function getId()         {   return $this->Id;           }
        public function getUsuario()    {   return $this->Usuario;      }
        public function getImagemType() {   return $this->ImagemType;   }
        public function getImagemSize() {   return $this->ImagemSize;   }
        public function getImagem()     {   return $this->Imagem;       }
        public function getTexto()      {   return $this->Texto;        }
        public function getLink()       {   return $this->Link;         }
        public function getDate()       {   return $this->Date;         } 
        public function getContador()   {   return $this->Contador;     }
        #endregion

        #region "Metodos Set"
        public function setId($Id)                  {   $this->Id           = $Id;          }
        public function setUsuario($Usuario)        {   $this->Usuario      = $Usuario;     }
        public function setImagemType($ImagemType)  {   $this->ImagemType   = $ImagemType;  }
        public function setImagemSize($ImagemSize)  {   $this->ImagemSize   = $ImagemSize;  }
        public function setImagem($Imagem)          {   $this->Imagem       = $Imagem;      }
        public function setTexto($Texto)            {   $this->Texto        = $Texto;       }
        public function setLink($Link)              {   $this->Link         = $Link;        }
        public function setDate($Date)              {   $this->Date         = $Date;        }
        public function setContador($Contador)      {   $this->Contador     = $Contador;    }
        #endregion

        #region "Dicionário da classe"
        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "ID"             , "IndiceClass" => "Id"         ]
                , ["IndiceBase" => "USUARIO"        , "IndiceClass" => "Usuario"    ]
                , ["IndiceBase" => "IMAGEM_TYPE"    , "IndiceClass" => "ImagemType" ]
                , ["IndiceBase" => "IMAGEM_SIZE"    , "IndiceClass" => "ImagemSize" ]
                , ["IndiceBase" => "IMAGEM"         , "IndiceClass" => "Imagem"     ]
                , ["IndiceBase" => "TEXTO"          , "IndiceClass" => "Texto"      ]
                , ["IndiceBase" => "LINK"           , "IndiceClass" => "Link"       ]
                , ["IndiceBase" => "DATE"           , "IndiceClass" => "Date"       ]
                , ["IndiceBase" => "CONTADOR"       , "IndiceClass" => "Contador"   ]
            );
        }
        #endregion
    }

?>