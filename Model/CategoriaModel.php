<?php

class CategoriaModel{
    public $idcategoria,$nome,$idf;
    public $linhas;
    
    public function save(){
        include 'Dao/CategoriaDao.php';
        $dados=new CategoriaDao();
        if (empty($this->idcategoria)) {
            # code...
            $dados->insert($this);
        } else {
            # code...
            $dados->update($this);
        }
        
    }
    public function listar($nome){
        include 'Dao/CategoriaDao.php';
        $dados=new CategoriaDao();
       $this->linhas= $dados->select($nome);

    }
    public function listarId(int $idcategoria){
        include 'Dao/CategoriaDao.php';
        $dados=new CategoriaDao();
        $obj=$dados->selectId($idcategoria);
        #codigo para nao receber id desconhecidos
        
        return ($obj) ? $obj :new CategoriaModel(); #operador ternario
       /* if($obj){
            return $obj;
        }else{
            return new CategoriaModel();
        }*/
    }
    public function delete(int $idcategoria){
        include 'Dao/CategoriaDao.php';
        $dados=new CategoriaDao();
        $dados->delete($idcategoria);
    } 
}
?>