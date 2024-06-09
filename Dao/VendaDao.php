<?php
#class que acessa ao banco de dados
class VendaDao{
    private $conexao;
    #contrutor de classes
    public function __construct(){
        $dados="mysql:host=localhost:3306;dbname=venda";
        $this->conexao=new PDO($dados,'root','');

    }
    public static function auth(){
        Middleware::auth();
    }
    
    #funcao para inserir os produtos no carrinho de compra
    public function insert(VendaModel $model){
        include "Dao/StockDao.php";
        $stock=new StockDao;
        foreach ($stock->selectStock() as $produto) {
            # code...
            $data=date("Y-m-d H:i:s");
            $sql="INSERT INTO carrinho(idproduto,quantidade, preco, codigo_barra, dataCarrinho, idstock)
            value (?,?,?,?,?,?)";
            $valor=$this->conexao->prepare($sql);
            $valor->bindValue(6,$produto->idstock);
        }
        $valor->bindValue(1,$model->idproduto);
        $valor->bindValue(2,$model->quantidade);
        $valor->bindValue(3,$model->quantidade*$model->preco_venda);
        $valor->bindValue(4,$model->codigo_barra);
        $valor->bindValue(5,$data);
        $valor->execute();
    }
    #funcao para reduzir a quantidade de produto no stock

    #funcao para atualizar os produtos no carrinho de compra
    public function update(VendaModel $model){
        $sql="UPDATE carrinho SET quantidade=quantidade+? WHERE idproduto=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$model->quantidade);
        $valor->bindValue(2,$model->idproduto);
        $valor->execute();
    }
    #funcao para listar todos os produtos que estão no carrinho de compra
    public function selectCarrinho(){
        $sql = "SELECT idstock,id_carrinho,preco_venda,idp,nome,descricao,qtd,SUM(vcarrinho.quantidade) as quantidade,SUM(vcarrinho.preco)
         as preco,codigo_barra,nomec FROM vcarrinho GROUP BY (codigo_barra) order by id_carrinho desc";
        $valor=$this->conexao->prepare($sql);
        $valor->execute();
        return $valor->fetchAll(PDO::FETCH_CLASS);
    }
    #funcao para listar todos os produtos que estão no carrinho de compra
    public function selectVendas($nome){
        $valor=null;
        if($nome == ""){
            $sql = "SELECT idv, nome,descricao,nomec, qtdrequerida, totalCompra, datavenda, fatura, nomef FROM vvenda
            order by idv desc ";
            $valor=$this->conexao->prepare($sql);
        }else{
            $sql = "SELECT idv, qtdrequerida,descricao,nomec, totalCompra, datavenda, fatura, nomef, nome 
            FROM vvenda  where nome like ? or nomef like ? or fatura like ? order by idv desc ";
            $valor=$this->conexao->prepare($sql);
            $pesquisar = "%$nome%"; 
            $valor->bindValue(1,$pesquisar);
            $valor->bindValue(2,$pesquisar);
            $valor->bindValue(3,$pesquisar);
        }
        $valor->execute();
        return $valor->fetchAll(PDO::FETCH_CLASS);
    }
    #funcao para listar todos os produtos que estão no carrinho de compra
    public function selectDiario($data){
            $sql = "SELECT idv, qtdrequerida, totalCompra, datavenda, fatura, nomef, nome ,
            SUM(vvenda.qtdrequerida) as qtdrequerida
        ,SUM(vvenda.totalCompra) as totalCompra FROM vvenda  where datavenda=? GROUP BY (nome)";
            $valor=$this->conexao->prepare($sql);
            $valor->bindValue(1,$data);
            $valor->execute();
            return $valor->fetchAll(PDO::FETCH_CLASS);
    }
   
        #funcao para vender os produtos 
        public function vender(VendaModel $model) {
            $funcionario=$_SESSION['idf'];
            $carrinho= new VendaDao;
            foreach ($carrinho->selectCarrinho() as $produto) {
            # code...
            $data = date('Y-m-d H:i:s');
            $fatura = date('YmdHis');
            $sql="INSERT INTO venda(qtdrequerida,totalCompra,datavenda,fatura,idf,idproduto,codigo_barra)
            values (?,?,?,?,?,?,?)";
            $valor=$this->conexao->prepare($sql);
            $valor->bindValue(1,$produto->quantidade);
            $valor->bindValue(2,$produto->preco);
            $valor->bindValue(3,$data);
            $valor->bindValue(4,$fatura);
            $valor->bindValue(5,$funcionario);
            $valor->bindValue(6,$produto->idp);
            $valor->bindValue(7,$produto->codigo_barra);
            $valor->execute();
            
        }
        foreach ($carrinho->selectCarrinho() as $value) {
            # code...
            $sql="UPDATE Stock SET qtd=qtd-? WHERE idstock=?";
            $valor2=$this->conexao->prepare($sql);
            $valor2->bindValue(1,$value->quantidade);
            $valor2->bindValue(2,$value->idstock);
            $valor2->execute();

        }
        
    }
    #=============fatura================================
   
    #funcao para cancelar todos os produtos no carrinho de compra
    public function Apagar(){
        $sql="DELETE FROM carrinho";
        $valor=$this->conexao->prepare($sql);
        $valor->execute();
    }
    #funcao para apagar um produto no carrinho de compra apartir da id
    public function CarrinhodeleteId(string $codigo_barra){
        $sql="DELETE FROM carrinho WHERE codigo_barra=?";
        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$codigo_barra);
        $valor->execute();
    }

}
?>