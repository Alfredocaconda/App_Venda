<?php

class StockModel{
    public $idstock,$qtd,$dataentrada,$idp,$idf,$preco_venda,$lucro,$pesq,$nome;
    public $linhas;
    
    public function save(){
        include 'Dao/StockDao.php';
        $dados=new StockDao();
        if (empty($this->idstock)) {
            # code...
            $dados->insert($this);
        } else {
            # code...
            $dados->update($this);
            
        }
    
    }
    public function saveQtd(){
        include 'Dao/StockDao.php';
        $dados=new StockDao();
        $obj=$dados->quantidade($this);
        return ($obj) ? $obj :new StockModel();
    }
    public function removerQtd(){
        include 'Dao/StockDao.php';
        $dados=new StockDao();
        $obj=$dados->quantidade($this);
        return ($obj) ? $obj :new StockModel();
    }
    #depende
       #listar todos os produtos que estao no stock
    public function listar($nome){
        include 'Dao/StockDao.php';
        $dados=new StockDao();
       $this->linhas= $dados->select($nome);
    }
    public function selectStock($nome){
        include 'Dao/StockDao.php';
        $dados=new StockDao();
       $this->linhas= $dados->selectStock($nome);
    }
  
    public function listarId(int $idstock){
        include 'Dao/StockDao.php';
        $dados=new StockDao();
        $obj=$dados->selectId($idstock);
        #codigo para nao receber id desconhecidos
        
        return ($obj) ? $obj :new StockModel(); #operador ternario
       /* if($obj){
            return $obj;
        }else{
            return new StockModel();
        }*/
    }
}
?>