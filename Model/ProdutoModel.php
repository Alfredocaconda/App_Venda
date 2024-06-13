<?php

class ProdutoModel{
    public $idp,$idf,$nome,$descricao,$idcategoria,$codigo_barra,$valor_compra;
    public $linhas;
    
    public function save(){
        include 'Dao/ProdutoDao.php';
        $dados=new ProdutoDao();
        if (empty($this->idp)) {
            # code...
            $dados->insert($this);
        } else {
            # code...
            $dados->update($this);
        }
    }
    public function listar($nome){
        include 'Dao/ProdutoDao.php';
        $dados=new ProdutoDao();
       $this->linhas= $dados->select($nome);

    }
    public function listarId(int $idp){
        include 'Dao/ProdutoDao.php';
        $dados=new ProdutoDao();
        $obj=$dados->selectId($idp);
        #codigo para nao receber id desconhecidos
        
        return ($obj) ? $obj :new ProdutoModel(); #operador ternario
       /* if($obj){
            return $obj;
        }else{
            return new ProdutoModel();
        }*/
    }
    public function delete(int $idp){
        include 'Dao/ProdutoDao.php';
        $dados=new ProdutoDao();
        $dados->delete($idp);
    } 
}
?>