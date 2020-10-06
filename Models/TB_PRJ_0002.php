<?php
    /*<sumary>
        Modelo referente a tabela TB_PRJ_0002.
    </sumary>*/

    require_once("BaseClass.php");

    class TB_PRJ_0002 extends BaseClass
    {
        #region "Propriedades"
        public $Id;
        public $TopoType;
        public $TopoSize;
        public $Topo;
        public $InicialType;
        public $InicialSize;
        public $Inicial;
        public $Status;
        public $Observacao;
        public $Facebook;
        public $Instagram;
        public $Twitter;
        public $Youtube;
        #endregion

        #region "Construtor"
        public function __construct($Id="",$TopoType="",$TopoSize="",$Topo="",$InicialType="",$InicialSize="", $Inicial="",$Status="",$Observacao="",$Facebook="",$Instagram="",$Twitter="",$Youtube="")
        {
            $this->Id           = $Id;
            $this->TopoType     = $TopoType;
            $this->TopoSize     = $TopoSize;
            $this->Topo         = $Topo;
            $this->InicialType  = $InicialType;
            $this->InicialSize  = $InicialSize;
            $this->Inicial      = $Inicial;
            $this->Status       = $Status;
            $this->Observacao   = $Observacao;
            $this->Facebook     = $Facebook;
            $this->Instagram    = $Instagram;
            $this->Twitter      = $Twitter;
            $this->Youtube      = $Youtube;
            parent::__construct();
        }
        #endregion

        #region "Metodos Get"
        public function getId()             {   return $this->Id;           }
        public function getTopoType()       {   return $this->TopoType;     }
        public function getTopoSize()       {   return $this->TopoSize;     }
        public function getTopo()           {   return $this->Topo;         }
        public function getInicialType()    {   return $this->InicialType;  }
        public function getInicialSize()    {   return $this->InicialSize;  }
        public function getInicial()        {   return $this->Inicial;      }
        public function getStatus()         {   return $this->Status;       }
        public function getObservacao()     {   return $this->Observacao;   }
        public function getFacebook()       {   return $this->Facebook;     }
        public function getInstagram()      {   return $this->Instagram;    }
        public function getTwitter()        {   return $this->Twitter;      }
        public function getYoutube()        {   return $this->Youtube;      }
        #endregion

        #region "Metodos Set"
        public function setId($Id)                      {   $this->Id           = $Id;          }
        public function setTopoType($TopoType)          {   $this->TopoType     = $TopoType;    }
        public function setTopoSize($TopoSize)          {   $this->TopoSize     = $TopoSize;    }
        public function setTopo($Topo)                  {   $this->Topo         = $Topo;        }
        public function setInicialType($InicialType)    {   $this->InicialType  = $InicialType; }
        public function setInicialSize($InicialSize)    {   $this->InicialSize  = $InicialSize; }
        public function setInicial($Inicial)            {   $this->Inicial      = $Inicial;     }
        public function setStatus($Status)              {   $this->Status       = $Status;      }
        public function setObservacao($Observacao)      {   $this->Observacao   = $Observacao;  }
        public function setFacebook($Facebook)          {   $this->Facebook     = $Facebook;    }
        public function setInstagram($Instagram)        {   $this->Instagram    = $Instagram;   }
        public function setTwitter($Twitter)            {   $this->Twitter      = $Twitter;     }
        public function setYoutube($Youtube)            {   $this->Youtube      = $Youtube;     }
        #endregion

        #region "Dicionário da classe"
        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "ID"             , "IndiceClass" => "Id"             ]
                , ["IndiceBase" => "TOPO_TYPE"      , "IndiceClass" => "TopoType"       ]
                , ["IndiceBase" => "TOPO_SIZE"      , "IndiceClass" => "TopoSize"       ]
                , ["IndiceBase" => "TOPO"           , "IndiceClass" => "Topo"           ]
                , ["IndiceBase" => "INICIAL_TYPE"   , "IndiceClass" => "InicialType"    ]
                , ["IndiceBase" => "INICIAL_SIZE"   , "IndiceClass" => "InicialSize"    ]
                , ["IndiceBase" => "INICIAL"        , "IndiceClass" => "Inicial"        ]
                , ["IndiceBase" => "STATUS"         , "IndiceClass" => "Status"         ]
                , ["IndiceBase" => "OBSERVACAO"     , "IndiceClass" => "Observacao"     ]
                , ["IndiceBase" => "FACEBOOK"       , "IndiceClass" => "Facebook"       ]
                , ["IndiceBase" => "INSTAGRAM"      , "IndiceClass" => "Instagram"      ]
                , ["IndiceBase" => "TWITTER"        , "IndiceClass" => "Twitter"        ]
                , ["IndiceBase" => "YOUTUBE"        , "IndiceClass" => "Youtube"        ]
            );
        }
        #endregion
    }

?>