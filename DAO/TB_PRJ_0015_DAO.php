<?php

    /*<sumary>
        Essa classe foi preparada para fazer a conexão entre o sistema e a entrada do usuario em um
        estabelecimento.
    </sumary>*/

    require_once("../Models/BaseDao.php");

    class TB_PRJ_0015_DAO extends BaseDao
    {
        #region "Metodo Construtor"
        public function __construct()
        {
            parent::__construct();
        }
        #endregion

        #region "Metodo para buscar baladas todas"
        public function BuscarBalada($InfoBusca)
        {
            $sql = "CALL SP_PRJ_0015_0003(?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $InfoBusca["Usuario"]);
                $this->Qry->bindValue(2, $InfoBusca["Dia"]);
                $this->Qry->bindValue(3, $InfoBusca["Hora"]);
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

        #region "Metodo para buscar balada em lista"
        public function BuscarBaladaLista($InfoBusca)
        {
            $sql = "CALL SP_PRJ_0015_0004(?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $InfoBusca["Usuario"]);
                $this->Qry->bindValue(2, $InfoBusca["Dia"]);
                $this->Qry->bindValue(3, $InfoBusca["Hora"]);
                $this->Qry->bindValue(4, $InfoBusca["Procurar"]);
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

        #region "Metodo para entrar na balada no banco"
        public function IngressarBalada($InfoBusca)
        {
            $sql = "CALL SP_PRJ_0009_0001(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $InfoBusca["Empresa"]);
                $this->Qry->bindValue(2, $InfoBusca["Usuario"]);
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

        #region "Metodo para sair da balada no banco"
        public function SairBalada($Id)
        {
            $sql = "CALL SP_PRJ_0009_0002(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Id);
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

        #region "Metodo para buscar Pessoas balada"
        public function BuscarPessoas($Empresa, $Id=0)
        {
            $sql = "CALL SP_PRJ_0009_0004(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Empresa);
                $this->Qry->bindValue(2, $Id);
                $this->Qry->execute();

                $ret = array(
                            "Item"      => $this->Qry->fetchAll(PDO::FETCH_ASSOC)
                            ,"RowCount"  => $this->Qry->rowCount()
                        );
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

        #region "Metodo para buscar Pessoas balada pesquisa"
        public function BuscarPessoasLista($Empresa, $Id, $Procurar)
        {
            $sql = "CALL SP_PRJ_0009_0006(?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Empresa);
                $this->Qry->bindValue(2, $Id);
                $this->Qry->bindValue(3, $Procurar);
                $this->Qry->execute();

                $ret = array(
                            "Item"      => $this->Qry->fetchAll(PDO::FETCH_ASSOC)
                            ,"RowCount"  => $this->Qry->rowCount()
                        );
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
        
        #region "Metodo para verificar se o usuario nao está ativo"
        public function VerificarAtivo($Usuario)
        {
            $sql = "CALL SP_PRJ_0009_0005(?)";

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