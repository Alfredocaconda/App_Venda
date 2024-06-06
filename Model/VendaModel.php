<?php

class VendaModel{
    public $id_carrinho,$nome,$descricao,$idstock,$idproduto,
    $quantidade,$preco,$codigo_barra,$dataVenda,$dataCarrinho,$idv,$qtdrequerida,$totalCompra,
    $datavenda,$fatura,$idf,$valorpago,$soma,$idp,$pesq,$preco_venda;
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
    public function relatorioDiario($nome){
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
       $this->listarVendas= $dados->selectDiario($nome);

    }
    public function relatorioPersonalizado($nome){
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
       $this->listarVendas= $dados->selectVendas($nome);

    }
   
    public function Apagar(){
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
        $dados->Apagar();
    } 
    public function removerId(string $codigo_barra){
       
        include 'Dao/VendaDao.php';
        $dados=new VendaDao();
        $dados->CarrinhodeleteId($codigo_barra);
    } 
  
}
?>
