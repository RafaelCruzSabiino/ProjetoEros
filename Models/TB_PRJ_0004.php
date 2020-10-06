<?php
    /*<sumary>
        Essa pagina gerencia a tabela TB_PRJ_0004
    </sumary>*/

    require_once("BaseClass.php");

    class TB_PRJ_0004 extends BaseClass
    {
        #region "Propriedades"
        public $Id;
        public $Rua;
        public $Numero;
        public $Bairro;
        public $Cep;
        public $Cidade;
        #endregion

        #region "Construtor"
        public function __construct($Id="",$Rua="",$Numero="",$Bairro="",$Cep="",$Cidade="")
        {
            $this->Id       = $Id;
            $this->Rua      = $Rua;
            $this->Numero   = $Numero;
            $this->Bairro   = $Bairro;
            $this->Cep      = $Cep;
            $this->Cidade   = $Cidade;
            parent::__construct();
        }
        #endregion

        #region "Metodos Get"
        public function getId()     {   return $this->Id;       }
        public function getRua()    {   return $this->Rua;      }
        public function getNumero() {   return $this->Numero;   }
        public function getBairro() {   return $this->Bairro;   }
        public function getCep()    {   return $this->Cep;      }
        public function getCidade() {   return $this->Cidade;   }
        #endregion

        #region "Metodos Set"
        public function setId($Id)          {   $this->Id       = $Id;      }
        public function setRua($Rua)        {   $this->Rua      = $Rua;     }
        public function setNumero($Numero)  {   $this->Numero   = $Numero;  }
        public function setBairro($Bairro)  {   $this->Bairro   = $Bairro;  }
        public function setCep($Cep)        {   $this->Cep      = $Cep;     }
        public function setCidade($Cidade)  {   $this->Cidade   = $Cidade;  }
        #endregion

        #region "Dicionário da classe"
        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "ID"     , "IndiceClass" => "Id"     ]
                , ["IndiceBase" => "RUA"    , "IndiceClass" => "Rua"    ]
                , ["IndiceBase" => "NUMERO" , "IndiceClass" => "Numero" ]
                , ["IndiceBase" => "BAIRRO" , "IndiceClass" => "Bairro" ]
                , ["IndiceBase" => "CEP"    , "IndiceClass" => "Cep"    ]
                , ["IndiceBase" => "CIDADE" , "IndiceClass" => "Cidade" ]
            );
        }
        #endregion
    }

?>