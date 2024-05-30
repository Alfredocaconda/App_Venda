<?php

class faturaperformaDao{
private $conexao;
#contrutor de classes
public function __construct(){
    $dados="mysql:host=localhost:3306;dbname=venda";
    $this->conexao=new PDO($dados,'root','');
}

public function performa() {
    include "Dao/VendaDao.php";
    $carrinho= new VendaDao;
    foreach ($carrinho->selectCarrinho() as $produto) {
        # code...
        $qtdStock=$produto->qtd + $produto->quantidade;
        $sql="UPDATE stock SET qtd=? WHERE idstock=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$qtdStock);
        $valor->bindValue(2,$produto->idstock);
        $valor->execute();
    }
        $sql="DELETE FROM carrinho";
        $valor=$this->conexao->prepare($sql);
        $valor->execute();
    }

}
?>