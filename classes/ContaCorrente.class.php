<?php
    class ContaCorrente {
        private $cc_numero;
        private $cc_saldo;
        private $cc_pf_id;
        private $cc_dt_ultima_alteracao;

        public function __construct($numero, $saldo, $pf_id, $dt) {
            $this->setNumero($numero);
            $this->setSaldo($saldo);
            $this->setPfId($pf_id);
            $this->setData($dt);
        }


        public function getNumero() {return $this->cc_numero;}

        public function getSaldo() {return $this->cc_saldo;}

        public function getPfId() {return $this->cc_pf_id;}

        public function getData() {return $this->cc_dt_ultima_alteracao;}

        public function setNumero($numero) {
           // if ($numero > 0 && $numero <> "")
                return $this->cc_numero = $numero;
            // else 
            //     throw new Exception("Número de conta inválido: ".$numero);
        }

        public function setSaldo($saldo) {
            //if ($saldo >= 0)
                return $this->cc_saldo = $saldo;
            //else 
              //  throw new Exception("Erro");
        }

        public function setPfId($pf_id) {
            // if ($pf_id > 0 && $pf_id <> "")
                return $this->cc_pf_id = $pf_id;
            // else 
            //     throw new Exception("Pessoa inválida: ".$pf_id);
             }
            
        public function setData($data) {
            //if ($data > 0 && $data <> "")
                return $this->cc_dt_ultima_alteracao = $data;
            // else 
            //     throw new Exception("Data invalida inválido: ".$data);
        }


        public function inserir() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO conta_corrent (cc_saldo, cc_pf_id, cc_dt_ultima_alteracao) VALUES(:cc_saldo, :cc_pf_id, :cc_dt_ultima_alteracao)');
            $stmt->bindValue(':cc_saldo', $this->getSaldo(), PDO::PARAM_STR);
            $stmt->bindValue(':cc_pf_id', $this->getPfId(), PDO::PARAM_STR);
            $stmt->bindValue(':cc_dt_ultima_alteracao', $this->getData(), PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function editar($cc_numero) {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE `prova1`.`conta_corrent` SET `cc_saldo` = :cc_saldo, `cc_pf_id` = :cc_pf_id, `cc_dt_ultima_alteracao` = :cc_dt_ultima_alteracao WHERE (`cc_numero` = :cc_numero);");
            $stmt->bindValue(':cc_numero', $this->setNumero($this->cc_numero), PDO::PARAM_INT);
            $stmt->bindValue(':cc_saldo', $this->setSaldo($this->cc_saldo), PDO::PARAM_STR);
            $stmt->bindValue(':cc_pf_id', $this->setPfId($this->cc_pf_id), PDO::PARAM_STR);
            $stmt->bindValue(':cc_dt_ultima_alteracao', $this->setData($this->cc_dt_ultima_alteracao), PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function excluir($cc_numero){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM conta_corrent WHERE cc_numero = :cc_numero');
            $stmt->bindValue(':cc_numero', $cc_numero);
            
            return $stmt->execute();
        }

        public function buscarCC($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM conta_corrent';
            if($id > 0){
                $query .= ' WHERE cc_pf_id = :Id';
                $stmt->bindParam(':Id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;

        }
    }

    ?>

