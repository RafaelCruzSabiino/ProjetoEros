<?php

    /*<sumary>
        Essa classe foi preparada para fazer a conexão entre o sistema e a tabela 
        TB_PRJ_0002 no banco de dados.
    </sumary>*/

    require_once("../Models/BaseDao.php");

    class TB_PRJ_0002_DAO extends BaseDao
    {
        #region "Metodo Construtor"
        public function __construct()
        {
            parent::__construct();
        }
        #endregion

        #region Inserir perfil inicial no banco de dados
        public function InserirPerfil($TB_PRJ_0002)
        {
            $sql = "CALL SP_PRJ_0002_0001(?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1,$TB_PRJ_0002->getInicialType());
                $this->Qry->bindValue(2,$TB_PRJ_0002->getInicialSize());
                $this->Qry->bindValue(3,$TB_PRJ_0002->getInicial());
                $this->Qry->execute();

                $ret = $this->BaseToModel($TB_PRJ_0002);
                $this->QryClose();
                $this->FecharConexao();

            }
            catch(PDOException $e)
            {
                $ret = "Erro na aplicação: " . $e->getMessage();
            }

            return $ret;
        }
        #endregion 

        #region "Metodo para alterar o perfil no banco"
        public function AlterarPerfil($TB_PRJ_0002)
        {
            $sql = "CALL SP_PRJ_0002_0002(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0002->getId());
                $this->Qry->bindValue(2, $TB_PRJ_0002->getTopoType());
                $this->Qry->bindValue(3, $TB_PRJ_0002->getTopoSize());
                $this->Qry->bindValue(4, $TB_PRJ_0002->getTopo());
                $this->Qry->bindValue(5, $TB_PRJ_0002->getInicialType());
                $this->Qry->bindValue(6, $TB_PRJ_0002->getInicialSize());
                $this->Qry->bindValue(7, $TB_PRJ_0002->getInicial());
                $this->Qry->bindValue(8, $TB_PRJ_0002->getStatus());
                $this->Qry->bindValue(9, $TB_PRJ_0002->getObservacao());
                $this->Qry->bindValue(10, $TB_PRJ_0002->getFacebook());
                $this->Qry->bindValue(11, $TB_PRJ_0002->getInstagram());
                $this->Qry->bindValue(12, $TB_PRJ_0002->getTwitter());
                $this->Qry->bindValue(13, $TB_PRJ_0002->getYoutube());
                $this->Qry->execute();

                $ret = $this->BaseToModel($TB_PRJ_0002);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                $ret = "Erro na aplicação: " . $e->getMessage();
            }

            return $ret;
        }   
        #endregion
    }

?>