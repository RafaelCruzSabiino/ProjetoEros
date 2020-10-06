<?php

    /*<sumary>
        Essa classe foi preparada para fazer a conexão entre o sistema e a tabela 
        TB_PRJ_0003 no banco de dados.
    </sumary>*/

    require_once("../Models/BaseDao.php");

    class TB_PRJ_0003_DAO extends BaseDao
    {
        #region "Metodo Construtor"
        public function __construct()
        {
            parent::__construct();
        }
        #endregion

        #region "Metodo para inserir galeria no banco"
        public function InserirGaleria($TB_PRJ_0003)
        {
            $sql = "CALL SP_PRJ_0003_0001(?,?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0003->getUsuario());
                $this->Qry->bindValue(2, $TB_PRJ_0003->getImagemType());
                $this->Qry->bindValue(3, $TB_PRJ_0003->getImagemSize());
                $this->Qry->bindValue(4, $TB_PRJ_0003->getImagem());
                $this->Qry->bindValue(5, $TB_PRJ_0003->getLegenda());
                $this->Qry->execute();

                $ret = $this->BaseToModel($TB_PRJ_0003);
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

        #region "Metodo para buscar galeria no banco"
        public function BuscarGaleria($TB_PRJ_0003)
        {
            $sql = "CALL SP_PRJ_0003_0004(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0003->getUsuario());
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