<?php
#class que acessa ao banco de dados
class ProdutoDao{
    private $conexao;
    #contrutor de classes
    public function __construct(){
        $dados="mysql:host=localhost:3306;dbname=venda";
        $this->conexao=new PDO($dados,'root','');
    }
    public function insert(ProdutoModel $model){
        $sql="INSERT INTO Produto (nome, descricao, idcategoria, valor_compra, codigo_barra,idf) 
        values (?,?,?,?,?,?)";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$model->nome);
        $valor->bindValue(2,$model->descricao);
        $valor->bindValue(3,$model->idcategoria);
        $valor->bindValue(4,$model->valor_compra);
        $valor->bindValue(5,$model->codigo_barra);
        $valor->bindValue(6,$model->idf);
        $valor->execute();
    }
    public function update(ProdutoModel $model){
        $sql="UPDATE produto SET nome=?, descricao=?, idcategoria=?, valor_compra=?, codigo_barra=?
        ,idf=? WHERE idp=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$model->nome);
        $valor->bindValue(2,$model->descricao);
        $valor->bindValue(3,$model->idcategoria);
        $valor->bindValue(4,$model->valor_compra);
        $valor->bindValue(5,$model->codigo_barra);
        $valor->bindValue(6,$model->idf);
        $valor->bindValue(7,$model->idp);
        $valor->execute();
    }
    public function select($nome){
    $valor=null;
    if($nome == ""){
        $sql="SELECT * FROM vproduto order by idp desc";
        $valor=$this->conexao->prepare($sql);
    }else{
        $sql="SELECT * FROM vproduto where nome like ? or codigo_barra like ? ";
        $valor=$this->conexao->prepare($sql);
        $pesquisar = "%$nome%"; 
        $valor->bindValue(1,$pesquisar);
        $valor->bindValue(2,$pesquisar);
    }
    $valor->execute();
    return $valor->fetchAll(PDO::FETCH_CLASS);
}
    public function selectId(int $idp){
        include_once "Model/ProdutoModel.php";
       $sql="SELECT * FROM vproduto where idp=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1, $idp);
        $valor->execute();
        return $valor->fetchObject("ProdutoModel");
    }
    public function delete(int $idp){
        $sql="DELETE FROM Produto WHERE idp=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1, $idp);
        $valor->execute();
    }
   
}
?>