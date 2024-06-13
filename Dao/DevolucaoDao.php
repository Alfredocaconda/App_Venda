<?php
#class que acessa ao banco de dados
class DevolucaoDao{
    private $conexao;
    #contrutor de classes
    public function __construct(){
        $dados="mysql:host=localhost:3306;dbname=venda";
        $this->conexao=new PDO($dados,'root','');
    }
   
    public function selectfatura($fatura){
        $valor=null;
        if($fatura == ""){
            $sql="SELECT * FROM vvenda order by idv desc";
            $valor=$this->conexao->prepare($sql);
        }else{
            $sql="SELECT * FROM vvenda where fatura like ?";
            $valor=$this->conexao->prepare($sql);
            $pesquisar = "%$fatura%"; 
            $valor->bindValue(1,$pesquisar);
        }
        $valor->execute();
        return $valor->fetchAll(PDO::FETCH_CLASS);
    }
    public function select_f(){
            $sql="SELECT * FROM vvenda order by idv desc";
            $valor=$this->conexao->prepare($sql);
        $valor->execute();
        return $valor->fetchAll(PDO::FETCH_CLASS);
    }
 
    public function delete(int $idp){
        $stock= new DevolucaoDao;
        foreach ($stock->select_f() as $value) {
            # code...
            $sql="UPDATE Stock SET qtd=qtd+? WHERE idp=?";
            $valor2=$this->conexao->prepare($sql);
            $valor2->bindValue(1,$value->qtdrequerida);
            $valor2->bindValue(2,$idp);
            $valor2->execute();

        }
        $sql="DELETE FROM venda WHERE idproduto=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1, $idp);
        $valor->execute();
    }
   
}
?>