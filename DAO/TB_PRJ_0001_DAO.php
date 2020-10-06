<?php
    /*<sumary>
        Essa classe foi preparada para fazer a conexão entre o sistema e a tabela 
        TB_PRJ_0001 no banco de dados.
    </sumary>*/

    require_once("../Models/BaseDao.php");

    class TB_PRJ_0001_DAO extends BaseDao
    {
        #region "Metodo Construtor"
        public function __construct()
        {
            parent::__construct();
        }
        #endregion
        
        #region "Metodo para validar o login no banco"
        public function ValidarLogin($TB_PRJ_0001)
        {
            $sql = "CALL SP_PRJ_0001_0009(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0001->getEmail());
                $this->Qry->bindValue(2, $TB_PRJ_0001->getCriptografia());
                $this->Qry->execute();

                $ret = $this->BaseToModel($TB_PRJ_0001);
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

        #region "Metodo para pegar todos os estados no banco"
        public function BuscarEstados()
        {
            $sql = "CALL SP_PRJ_0006_0001()";
        
            try
            {
                $this->AbrirConexao();
                $qry = $this->Base->prepare($sql);
                $ret = $qry->execute();
                $info = $qry->fetchAll(PDO::FETCH_ASSOC);
                $this->FecharConexao();
        
                if($ret)
                {
                    return $info;
                }
                else
                {
                    return false;
                }
            }
            catch(PDOException $ex)
            {
                return getMessage($ex);
            }
        }
        #endregion

        #region "Metodo para buscar as cidades conforme o estado no banco"
        public function BuscarCidades($Estado)
        {
            $sql = "CALL SP_PRJ_0005_0001(?)";

            try
            {
                $this->AbrirConexao();
                $qry = $this->Base->prepare($sql);
                $qry->bindValue(1, $Estado);
                $ret = $qry->execute();
                $info = $qry->fetchAll(PDO::FETCH_ASSOC);
                $this->FecharConexao();

                if($ret)
                {
                    return $info;
                }
                else
                {
                    return false;
                }
            }
            catch(PDOException $ex)
            {
                return getMessage($ex);
            }
        }
        #endregion

        #region "Metodo para inserir usuario no banco"
        public function InserirUsuario($TB_PRJ_0001)
        {
            $sql = "CALL SP_PRJ_0001_0001(?,?,?,?,?,?,?,?)";

            try
            {   
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0001->getNome());
                $this->Qry->bindValue(2, $TB_PRJ_0001->getAbreviacao());
                $this->Qry->bindValue(3, $TB_PRJ_0001->getCnpj());
                $this->Qry->bindValue(4, $TB_PRJ_0001->getEmailPessoal());
                $this->Qry->bindValue(5, $TB_PRJ_0001->getEmail());
                $this->Qry->bindValue(6, $TB_PRJ_0001->getSenha());
                $this->Qry->bindValue(7, $TB_PRJ_0001->getCriptografia());
                $this->Qry->bindValue(8, $TB_PRJ_0001->getTipo());
                $this->Qry->execute();
                
                $ret = $this->BaseToModel($TB_PRJ_0001);
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

        #region "Metodo para Inserir o resto de informaçao do usuario"
        public function InserirInformacaoUsuario($TB_PRJ_0001)
        {
            $sql = "CALL SP_PRJ_0001_0012(?,?,?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0001->getId());
                $this->Qry->bindValue(2, $TB_PRJ_0001->getPermissao());
                $this->Qry->bindValue(3, $TB_PRJ_0001->getDataNascimento());
                $this->Qry->bindValue(4, $TB_PRJ_0001->getSexo());
                $this->Qry->bindValue(5, $TB_PRJ_0001->getEndereco());
                $this->Qry->bindValue(6, $TB_PRJ_0001->getPerfil());
                $this->Qry->execute();

                $ret = $this->BaseToModel($TB_PRJ_0001);
                $this->QryClose();
                $this->FecharConexao();

            }
            catch(PDOException $e)
            {
                $ret = "Erro na aplicação: " . $e.getMessage();
            }

            return $ret;
        }
        #endregion

        #region "Metodo para buscar o usuario no banco"
        public function BuscarUsuario($Usuario)
        {
            $sql = "CALL SP_PRJ_0001_0007(?)";

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
    
        #region "Metodo para Alterar o Usuario no banco"
        public function AlterarUsuario($TB_PRJ_0001)
        {
            $sql = "CALL SP_PRJ_0001_0002(?,?,?,?,?,?,?,?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $TB_PRJ_0001->getId());
                $this->Qry->bindValue(2, $TB_PRJ_0001->getNome());
                $this->Qry->bindValue(3, $TB_PRJ_0001->getAbreviacao());
                $this->Qry->bindValue(4, $TB_PRJ_0001->getCnpj());
                $this->Qry->bindValue(5, $TB_PRJ_0001->getEmailPessoal());
                $this->Qry->bindValue(6, $TB_PRJ_0001->getEmail());
                $this->Qry->bindValue(7, $TB_PRJ_0001->getSenha());
                $this->Qry->bindValue(8, $TB_PRJ_0001->getCriptografia());
                $this->Qry->bindValue(9, $TB_PRJ_0001->getPermissao());
                $this->Qry->bindValue(10, $TB_PRJ_0001->getDataNascimento());
                $this->Qry->bindValue(11, $TB_PRJ_0001->getSexo()); 
                $this->Qry->execute();

                $ret = $this->BaseToModel($TB_PRJ_0001);
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

        #region "Metodo para Inserir horarios"
        public function InserirData($Usuario, $Dia, $Hora_Inicio, $Hora_Fim)
        {
            $sql = "CALL SP_PRJ_0015_0001(?,?,?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Usuario);
                $this->Qry->bindValue(2, $Dia);
                $this->Qry->bindValue(3, $Hora_Inicio);
                $this->Qry->bindValue(4, $Hora_Fim);
                $this->Qry->execute();

                $ret = $this->Qry->fetchAll(PDO::FETCH_ASSOC)[0];
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

        #region "Metodo para buscar o usuario em lista do banco"
        public function BuscarUsuarioLista($Procurar)
        {
            $sql = "CALL SP_PRJ_0001_0004(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $Procurar);
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