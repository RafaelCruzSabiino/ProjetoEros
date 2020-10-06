<?php

    /*<sumary>
        Essa classe foi preparada para fazer a conexão entre o sistema e a tabela 
        TB_PRJ_0004 no banco de dados.
    </sumary>*/

    require_once("../Models/BaseDao.php");

    class TB_PRJ_0004_DAO extends BaseDao
    {
        #region "Metodo Construtor"
        public function __construct()
        {
            parent::__construct();
        }
        #endregion

        #region "Metodo para inserir endereco no banco"
        public function InserirEndereco($TB_PRJ_0004)
        {
            $sql = "CALL SP_PRJ_0004_0001(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0004->getCidade());
                $this->Qry->execute();
                
                $ret = $this->BaseToModel($TB_PRJ_0004);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $ex)
            {
                $ret = "Erro na aplicação: " . $e->getMessage();
            }

            return $ret;
        }
        #endregion
    }
