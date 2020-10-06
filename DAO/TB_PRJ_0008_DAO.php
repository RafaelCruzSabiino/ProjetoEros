<?php

    /*<sumary>
        Essa classe foi preparada para fazer a conexão entre o sistema e a tabela 
        TB_PRJ_0008 no banco de dados.
    </sumary>*/

    require_once("../Models/BaseDao.php");

    class TB_PRJ_0008_DAO extends BaseDao
    {
        #region "Metodo Construtor"
        public function __construct()
        {
            parent::__construct();
        }
        #endregion

        #region "Metado para inserir publicacao no banco"
        public function InserirPublicacao($TB_PRJ_0008)
        {
            $sql = "CALL SP_PRJ_0008_0001(?,?,?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0008->getUsuario());
                $this->Qry->bindValue(2, $TB_PRJ_0008->getImagemType());
                $this->Qry->bindValue(3, $TB_PRJ_0008->getImagemSize());
                $this->Qry->bindValue(4, $TB_PRJ_0008->getImagem());
                $this->Qry->bindValue(5, $TB_PRJ_0008->getTexto());
                $this->Qry->bindValue(6, $TB_PRJ_0008->getLink());
                $this->Qry->execute();

                $ret = $this->BaseToModel($TB_PRJ_0008);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PSOException $e)
            {
                $ret = 'Erro na aplicação: ' . $e->getMessage();
            }

            return $ret;
        }
        #endregion

        #region "Metodo para buscar publicacao"
        public function BuscarPublicacao($TB_PRJ_0008)
        {
            $sql = "CALL SP_PRJ_0008_0003(?,?)";

            try
            {   
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0008->getUsuario());
                $this->Qry->bindValue(2, $TB_PRJ_0008->getContador());
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

        #region "Metodo para buscar um usuario em expecifico"
        public function BuscarExpecifica($TB_PRJ_0008)
        {
            $sql = "CALL SP_PRJ_0008_0004(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0008->getUsuario());
                $this->Qry->bindValue(2, $TB_PRJ_0008->getContador());
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

        #region "Metodo para curtir no banco"
        public function Curtir($Usuario, $Publicacao)
        {
            $sql = "CALL SP_PRJ_0010_0001(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Publicacao);
                $this->Qry->bindValue(2, $Usuario);
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

        #region "Metodo para Descurtir no banco"
        public function Descurtir($Usuario, $Publicacao)
        {
            $sql = "CALL SP_PRJ_0010_0004(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Publicacao);
                $this->Qry->bindValue(2, $Usuario);
                $this->Qry->execute();

                $ret = $this->Qry->rowCount();
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

        #region "Metodo para buscar total curtida balada no banco"
        public function BuscarCurtida($Publicacao)
        {
            $sql = "CALL SP_PRJ_0010_0002(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Publicacao);
                $this->Qry->execute();

                $ret = $this->Qry->rowCount();
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

        #region "Metodo para verificar se o usuario já curtiu no banco"
        public function VerificarCurtida($Publicacao, $Usuario)
        {
            $sql = "CALL SP_PRJ_0010_0003(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Publicacao);
                $this->Qry->bindValue(2, $Usuario);
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

        #region "Metodo para se o ususario já cutiu para reaproveitar o registro no banco"
        public function VerificarDesativa($Usuario, $Publicacao)
        {
            $sql = "CALL SP_PRJ_0010_0005(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Publicacao);
                $this->Qry->bindValue(2, $Usuario);
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

        #region "Metodo para inserir novamente a curtida no banco"
        public function InserirCurtidaNovamente($Usuario, $Publicacao)
        {
            $sql = "CALL SP_PRJ_0010_0006(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Publicacao);
                $this->Qry->bindValue(2, $Usuario);
                $this->Qry->execute();

                $ret = $this->Qry->rowCount();
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

        #region "Metodo para inserir comentario no banco"
        public function InserirComentario($Publicacao, $Usuario, $Texto)
        {
            $sql = "CALL SP_PRJ_0017_0001(?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Publicacao);
                $this->Qry->bindValue(2, $Usuario);
                $this->Qry->bindValue(3, $Texto);
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

        #region "Metodo para buscar comentario"
        public function BuscarComentario($Publicacao, $Limitador)
        {
            $sql = "CALL SP_PRJ_0017_0002(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Publicacao);
                $this->Qry->bindValue(2, $Limitador);
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