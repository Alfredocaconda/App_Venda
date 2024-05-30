<?php

class FuncionarioModel{
    public $idf,$nome,$genero,$bilhete,$estado,$cargo,$data_nascimento,$senha,
    $telefone_email,$endereco;
    public $linhas;
    
    public function save(){
        include 'Dao/FuncionarioDao.php';
        $dados=new FuncionarioDao();
        if (empty($this->idf)) {
            # code...
            $dados->insert($this);
        } else {
            # code...
            $dados->update($this);
        }
    }
    public function listar($nome){
        include 'Dao/FuncionarioDao.php';
        $dados=new FuncionarioDao();
       $this->linhas= $dados->select($nome);
    }
    public function listarId(int $idf){
        include 'Dao/FuncionarioDao.php';
        $dados=new FuncionarioDao();
        $obj=$dados->selectId($idf);
        #codigo para nao receber id desconhecidos
        
        return ($obj) ? $obj :new FuncionarioModel(); #operador ternario
       /* if($obj){
            return $obj;
        }else{
            return new FuncionarioModel();
        }*/
    }
    public function delete(int $idf){
        include 'Dao/FuncionarioDao.php';
        $dados=new FuncionarioDao();
        $dados->delete($idf);
    } 
}
?>