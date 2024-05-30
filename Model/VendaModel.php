<?php

class VendaModel{
    public $id_carrinho,$nome,$descricao,$idstock,$idproduto,
    $quantidade,$preco,$codigo_barra,$dataVenda,$dataCarrinho,$idv,$qtdrequerida,$totalCompra,
    $datavenda,$fatura,$idf,$valorpago,$soma,$idp,$pesq;
    public $linhas,$linha,$listarVendas;
    public function save(){
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
        $dados->insert($this);
    }
  
    public function finalizar(){
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
        $dados->vender($this);
    }
   #listar os produtos que estao no carrinho de compra
    public function listarcarrinho(){
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
       $this->linha= $dados->selectCarrinho();

    }
    public function listarVendas($nome){
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
       $this->listarVendas= $dados->selectVendas($nome);

    }
   
    public function Cancelar(){
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
        $dados->Cancelar();
    } 
    public function removerId(int $id_carrinho){
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
        $dados->CarrinhodeleteId($id_carrinho);
    } 
  
}
?>