<?php
    /*<sumary>
        Modelo referente a tabela TB_PRJ_0001.
    </sumary>*/

    require_once("BaseClass.php");

    class TB_PRJ_0001 extends BaseClass
    {
        #region "Propriedades"
        public $Id;
        public $Nome;
        public $Abreviacao;
        public $Cnpj;
        public $EmailPessoal;
        public $Email;
        public $Senha;
        public $Criptografia;
        public $Tipo;
        public $Permissao;
        public $DataNascimento;
        public $Sexo;
        public $Endereco;
        public $Perfil;
        public $Date;
        #endregion

        #region "Construtor"
        public function __construct($Id="",$Nome="",$Abreviacao="",$Cnpj="",$EmailPessoal="",$Email="", $Senha="",$Criptografia="",$Tipo="",$Permissao="",$DataNascimento="",$Sexo="",$Endereco="",$Perfil="",$Date="")
        {
            $this->Id               = $Id;
            $this->Nome             = $Nome;
            $this->Abreviacao       = $Abreviacao;
            $this->Cnpj             = $Cnpj;
            $this->EmailPessoal     = $EmailPessoal;
            $this->Email            = $Email;
            $this->Senha            = $Senha;
            $this->Criptografia     = $Criptografia;
            $this->Tipo             = $Tipo;
            $this->Permissao        = $Permissao;
            $this->DataNascimento   = $DataNascimento;
            $this->Sexo             = $Sexo;
            $this->Endereco         = $Endereco;
            $this->Perfil           = $Perfil;
            $this->Date             = $Date;
            parent::__construct();
        }
        #endregion

        #region "Metodos Get"
        public function getId()             {   return $this->Id;               }
        public function getNome()           {   return $this->Nome;             }
        public function getAbreviacao()     {   return $this->Abreviacao;       }
        public function getCnpj()           {   return $this->Cnpj;             }
        public function getEmailPessoal()   {   return $this->EmailPessoal;     }
        public function getEmail()          {   return $this->Email;            }
        public function getSenha()          {   return $this->Senha;            }
        public function getCriptografia()   {   return $this->Criptografia;     }
        public function getTipo()           {   return $this->Tipo;             }
        public function getPermissao()      {   return $this->Permissao;        }
        public function getDataNascimento() {   return $this->DataNascimento;   }
        public function getSexo()           {   return $this->Sexo;             }
        public function getEndereco()       {   return $this->Endereco;         }
        public function getPerfil()         {   return $this->Perfil;           }
        public function getDate()           {   return $this->Date;             }
        #endregion

        #region "Metodos Set"
        public function setId($Id)                          {   $this->Id               = $Id;              }
        public function setNome($Nome)                      {   $this->Nome             = $Nome;            }
        public function setAbreviacao($Abreviacao)          {   $this->Abreviacao       = $Abreviacao;      }
        public function setCnpj($Cnpj)                      {   $this->Cnpj             = $Cnpj;            }
        public function setEmailPessoal($EmailPessoal)      {   $this->EmailPessoal     = $EmailPessoal;    }
        public function setEmail($Email)                    {   $this->Email            = $Email;           }
        public function setSenha($Senha)                    {   $this->Senha            = $Senha;           }
        public function setCriptografia($Criptografia)      {   $this->Criptografia     = $Criptografia;    }
        public function setTipo($Tipo)                      {   $this->Tipo             = $Tipo;            }
        public function setPermissao($Permissao)            {   $this->Permissao        = $Permissao;       }
        public function setDataNascimento($DataNascimento)  {   $this->DataNascimento   = $DataNascimento;  }
        public function setSexo($Sexo)                      {   $this->Sexo             = $Sexo;            }
        public function setEndereco($Endereco)              {   $this->Endereco         = $Endereco;        }
        public function setPerfil($Perfil)                  {   $this->Perfil           = $Perfil;          }
        public function setDate($Date)                      {   $this->Date             = $Date;            }
        #endregion

        #region "Dicionário da classe"
        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "ID"                 , "IndiceClass" => "Id"             ]
                , ["IndiceBase" => "NOME"               , "IndiceClass" => "Nome"           ]
                , ["IndiceBase" => "ABREVIACAO"         , "IndiceClass" => "Abreviacao"     ]
                , ["IndiceBase" => "CNPJ"               , "IndiceClass" => "Cnpj"           ]
                , ["IndiceBase" => "EMAILPESSOAL"       , "IndiceClass" => "EmailPessoal"   ]
                , ["IndiceBase" => "EMAIL"              , "IndiceClass" => "Email"          ]
                , ["IndiceBase" => "SENHA"              , "IndiceClass" => "Senha"          ]
                , ["IndiceBase" => "CRIPTOGRAFIA"       , "IndiceClass" => "Criptografia"   ]
                , ["IndiceBase" => "TIPO"               , "IndiceClass" => "Tipo"           ]
                , ["IndiceBase" => "PERMISSAO"          , "IndiceClass" => "Permissao"      ]
                , ["IndiceBase" => "DATA_NASCIMENTO"    , "IndiceClass" => "DataNascimento" ]
                , ["IndiceBase" => "SEXO"               , "IndiceClass" => "Sexo"           ]
                , ["IndiceBase" => "ENDERECO"           , "IndiceClass" => "Endereco"       ]
                , ["IndiceBase" => "PERFIL"             , "IndiceClass" => "Perfil"         ]
                , ["IndiceBase" => "DATE"               , "IndiceClass" => "Date"           ]
            );
        }
        #endregion
    }

?>