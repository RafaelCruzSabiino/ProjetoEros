<?php

    /*<sumary>
        Essa classe foi preparada para fazer a conexão entre o sistema e a tabela 
        TB_PRJ_0012 no banco de dados.
    </sumary>*/

    require_once("../Models/BaseDao.php");

    class TB_PRJ_0012_DAO extends BaseDao
    {
        #region "Metodo Construtor"
        public function __construct()
        {
            parent::__construct();
        }
        #endregion

        #region "Metodo para verificar se ja possui chat"
        public function VerificarChat($Model)
        {
            $sql = "CALL SP_PRJ_0011_0002(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Model->getUsuario_1());
                $this->Qry->bindValue(2, $Model->getUsuario_2());
                $this->Qry->execute();

                $ret = $this->Qry->fetchAll(PDO::FETCH_ASSOC);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                $ret = 'Erro na aplicação: ' . $e->getMessage();
            }

            return $ret;
        }
        #endregion

        #region "Metodo para inserir chat"
        public function InserirChat()
        {
            $sql = "CALL SP_PRJ_0012_0001()";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->execute();

                $ret = $this->Qry->fetchAll(PDO::FETCH_ASSOC);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                $ret = 'Erro na aplicação: ' . $e->getMessage();
            }

            return $ret;
        }
        #endregion

        #region "Metodo para inserir definições"
        public function InserirDefinicao($Model)
        {
            $sql = "CALL SP_PRJ_0011_0001(?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Model->getUsuario_1());
                $this->Qry->bindValue(2, $Model->getUsuario_2());
                $this->Qry->bindValue(3, $Model->getId());
                $this->Qry->execute();

                $ret = $this->Qry->fetchAll(PDO::FETCH_ASSOC);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                $ret = 'Erro na aplicação: ' . $e->getMessage();
            }

            return $ret;
        }
        #endregion

        #region "Metodo para inserir mensagem"
        public function InserirMensagem($Model)
        {
            $sql = "CALL SP_PRJ_0016_0001(?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Model->getMensagem());
                $this->Qry->bindValue(2, $Model->getUsuario_1());                
                $this->Qry->bindValue(3, $Model->getId());
                $this->Qry->execute();

                $ret = $this->Qry->fetchAll(PDO::FETCH_ASSOC);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                $ret = 'Erro na aplicação: ' . $e->getMessage();
            }

            return $ret;
        }
        #endregion
        
        #region "Metodo para buscar mensagem"
        public function BuscarMensagem($Model)
        {
            $sql = "CALL SP_PRJ_0016_0002(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Model->getId());
                $this->Qry->execute();

                $ret = $this->Qry->fetchAll(PDO::FETCH_ASSOC);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                $ret = 'Erro na aplicação: ' . $e->getMessage();
            }

            return $ret;
        }
        #endregion

        #region "Metodo para buscar Pessoas Chat"
        public function BuscarPessoas($Usuario)
        {
            $sql = "CALL SP_PRJ_0011_0003(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Usuario);
                $this->Qry->execute();

                $ret = $this->Qry->fetchAll(PDO::FETCH_ASSOC);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                $ret = 'Erro na aplicação: ' . $e->getMessage();
            }

            return $ret;
        }
        #endregion

    }

?>