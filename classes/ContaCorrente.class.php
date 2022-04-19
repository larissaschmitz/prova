<?php

        class ContaCorrente {
            private $numero;
            private $saldo;
            private $pf_id;
            private $data;

            public function __construct($numero, $saldo, $pf_id, $data) {
                $this->setNumero($numero);
                $this->setSaldo($saldo);
                $this->setPfId($pf_id);
                $this->setData($data);
            }

            public function getNumero() {return $this->numero;}

            public function getSaldo() {return $this->saldo;}

            public function getPfId() {return $this->pf_id;}

            public function getData() {return $this->data;}


            public function setNumero($novoNumero) {return $this->numero = $novoNumero;}

            public function setSaldo($novoSaldo) {return $this->saldo = $novoSaldo;}

            public function setPfId($pf_id) {return $this->pf_id = $pf_id;}
            
            public function setData($novaData) {return $this->data = $novaData;}



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
                $stmt->bindValue(':cc_numero', $this->setNumero($this->numero), PDO::PARAM_INT);
                $stmt->bindValue(':cc_saldo', $this->setSaldo($this->saldo), PDO::PARAM_STR);
                $stmt->bindValue(':cc_pf_id', $this->setPfId($this->pf_id), PDO::PARAM_STR);
                $stmt->bindValue(':cc_dt_ultima_alteracao', $this->setData($this->data), PDO::PARAM_STR);
                return $stmt->execute();
            }


            function excluir($cc_numero){
                $pdo = Conexao::getInstance();
                $stmt = $pdo ->prepare('DELETE FROM conta_corrent WHERE cc_numero = :cc_numero');
                $stmt->bindValue(':cc_numero', $cc_numero);
                
                return $stmt->execute();
            }

            

         }

    ?>
    </div>
</body>
</html>
