<?php

class DevolucaoModel{
    public $fatura;
    public $linhas;
    
   
    public function listar_fatura($fatura){
        include 'Dao/DevolucaoDao.php';
        $dados=new DevolucaoDao();
       $this->linhas= $dados->selectfatura($fatura);

    }
    public function delete(int $idp){
        include 'Dao/DevolucaoDao.php';
        $dados=new DevolucaoDao();
        $dados->delete($idp);
    } 
}
?>