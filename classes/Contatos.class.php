<?php
    class Contatos{
        private $cont_id;
        private $cont_tipo;
        private $cont_descricao;
        private $cont_pf_id;

        public function __construct($nid, $nt, $nd, $ndPFId){
            $this->setId($nid);
            $this->setTipo($nt);
            $this->setDescricao($nd);
            $this->setPFId($ndPFId);
        }

        public function getId(){return $this->cont_id;}

        public function getTipo(){return $this->cont_tipo;}

        public function getDescricao(){return $this->cont_descricao;}

        public function getPFId(){return $this->cont_pf_id;}
        

        public function setId($novoId){return $this->cont_id = $novoId;}

        public function setTipo($novoTipo){return $this->cont_tipo = $novoTipo;}

        public function setDescricao($novoDescricao){return $this->cont_descricao = $novoDescricao;} 

        public function setPFId($novoPFId){return $this->cont_pf_id = $novoPFId;} 


        
        public function inserir(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO contatos (cont_tipo, cont_descricao, cont_pf_id) VALUES(:cont_tipo, :cont_descricao, :cont_pf_id)');
            $stmt->bindValue(':cont_tipo', $this->getTipo());
            $stmt->bindValue(':cont_descricao', $this->getDescricao());
            $stmt->bindValue(':cont_pf_id', $this->getPFId());

            return $stmt->execute(); 
        }

        public function editar($cont_id){
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare('UPDATE contatos SET cont_tipo = :cont_tipo, cont_descricao = :cont_descricao, cont_pf_id = :cont_pf_id WHERE cont_id = :cont_id');
                $stmt->bindValue(':cont_id', $this->setId($this->cont_id));
                $stmt->bindValue(':cont_tipo', $this->setTipo($this->cont_tipo));
                $stmt->bindValue(':cont_descricao', $this->setDescricao($this->cont_descricao));
                $stmt->bindValue(':cont_pf_id', $this->setPFId($this->cont_pf_id));

                return $stmt->execute();
            }

        function excluir($cont_id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM contatos WHERE cont_id = :cont_id');
            $stmt->bindValue(':cont_id', $cont_id);
            
            return $stmt->execute();
        }
       
              
    }



?>