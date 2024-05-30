<?php
#class que acessa ao banco de dados
class CategoriaDao{
    private $conexao;
    #contrutor de classes
    public function __construct(){
        $dados="mysql:host=localhost:3306;dbname=venda";
        $this->conexao=new PDO($dados,'root','');
    }
    public function insert(CategoriaModel $model){
        $sql="INSERT INTO categoria (nome,idf) values (?,?)";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$model->nome);
        $valor->bindValue(2,$model->idf);
        $valor->execute();
    }
    public function update(CategoriaModel $model){
        $sql="UPDATE categoria SET nome=?,idf=? WHERE idcategoria=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$model->nome);
        $valor->bindValue(2,$model->idf);
        $valor->bindValue(3,$model->idcategoria);
        $valor->execute();
    }
    public function select($nome){
        $valor=null;
        if($nome == ""){
            $sql="SELECT * FROM vcategoria order by idcategoria desc";
            $valor=$this->conexao->prepare($sql);
        }else{
            $sql="SELECT * FROM vcategoria where nome = ?";
            $valor=$this->conexao->prepare($sql);
            $valor->bindValue(1,$nome);
        }
        $valor->execute();
        return $valor->fetchAll(PDO::FETCH_CLASS);
    }
 
    public function selectId(int $idcategoria){
        include_once "Model/CategoriaModel.php";
        $sql="SELECT * FROM categoria WHERE idcategoria=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1, $idcategoria);
        $valor->execute();
        return $valor->fetchObject("CategoriaModel");
    }
    public function delete(int $idcategoria){
        $sql="DELETE FROM Categoria WHERE idcategoria=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1, $idcategoria);
        $valor->execute();
    }
   
}
?>