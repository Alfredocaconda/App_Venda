<?php
#class que acessa ao banco de dados
class FuncionarioDao{
    private $conexao;
    #contrutor de classes
    public function __construct(){
        $dados="mysql:host=localhost:3306;dbname=venda";
        $this->conexao=new PDO($dados,'root','');
    }
    public function insert(FuncionarioModel $model){
        $sql="INSERT INTO funcionario (nome,genero,bilhete,estado,cargo,data_nascimento,senha,
        telefone_email,endereco) values (?,?,?,?,?,?,sha1(?),?,?)";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$model->nome);
        $valor->bindValue(2,$model->genero);
        $valor->bindValue(3,$model->bilhete);
        $valor->bindValue(4,$model->estado);
        $valor->bindValue(5,$model->cargo);
        $valor->bindValue(6,$model->data_nascimento);
        $valor->bindValue(7,$model->senha);
        $valor->bindValue(8,$model->telefone_email);
        $valor->bindValue(9,$model->endereco);
        $valor->execute();
    }
    public function update(FuncionarioModel $model){
        $sql="UPDATE funcionario SET nome=?,genero=?,bilhete=?,estado=?,cargo=?,data_nascimento=?,
        senha=sha1(?),telefone_email=?,endereco=? WHERE idf=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$model->nome);
        $valor->bindValue(2,$model->genero);
        $valor->bindValue(3,$model->bilhete);
        $valor->bindValue(4,$model->estado);
        $valor->bindValue(5,$model->cargo);
        $valor->bindValue(6,$model->data_nascimento);
        $valor->bindValue(7,$model->senha);
        $valor->bindValue(8,$model->telefone_email);
        $valor->bindValue(9,$model->endereco);
        $valor->bindValue(10,$model->idf);
        $valor->execute();
    }
    public function select($nome){
        $valor=null;
    if($nome == ""){
        $sql="SELECT * FROM funcionario order by idf desc";
        $valor=$this->conexao->prepare($sql);
    }else{
        $sql="SELECT * FROM funcionario where nome like ? or cargo like ? ";
        $valor=$this->conexao->prepare($sql);
        $pesquisar = "%$nome%"; 
        $valor->bindValue(1,$pesquisar);
        $valor->bindValue(2,$pesquisar);
    }
    $valor->execute();
    return $valor->fetchAll(PDO::FETCH_CLASS);
    }
    public function selectId(int $idf){
        include_once "Model/FuncionarioModel.php";
        $sql="SELECT * FROM funcionario WHERE idf=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1, $idf);
        $valor->execute();
        return $valor->fetchObject("FuncionarioModel");
    }
    public function delete(int $idf){
        $sql="DELETE FROM funcionario WHERE idf=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1, $idf);
        $valor->execute();
    }
   
}
?>