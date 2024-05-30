<?php

class faturaModel{
    public $id_carrinho,$nome,$descricao,$idstock,$idproduto,
    $quantidade,$preco,$codigo_barra,$dataVenda,$dataCarrinho,$idv,$qtdrequerida,$totalCompra,
    $datavenda,$fatura,$idf,$valorpago,$soma,$idp,$pesq;
    public $linhas,$linha;
    public function performa(){
        include 'Dao/faturaperformaDao.php';
        $dados=new faturaperformaDao();
        $dados->performa($this);
    }
}

?>