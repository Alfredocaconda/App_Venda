<?php
class LoginDAO {
    private $conexao;
    #contrutor de classes
    public function __construct(){
        $dados="mysql:host=localhost:3306;dbname=venda";
        $this->conexao=new PDO($dados,'root','');
    }
    public static function index(){
        include "View/Modules/login/login.php";
    }
    public static function login(){

    }
    public function autenticar(LoginModel $model){
        session_start();
        $sql="SELECT * FROM funcionario where telefone_email=? and senha=sha1(?)";

        $valor=$this->conexao->prepare($sql);
        $valor->bindValue(1,$model->email);
        $valor->bindValue(2,$model->password);
        
        $valor->execute();
        
        $dados=$valor->fetchObject();
        $_SESSION['nome']=$dados->nome; 
        $_SESSION['cargo']=$dados->cargo; 
        $_SESSION['idf']=$dados->idf; 
        $_SESSION['estado']=$dados->estado; 
        

    if (isset($_SESSION['nome']) && isset( $_SESSION['cargo'])) {
            # code...
            if ($_SESSION['estado']=="activo") {
                # code...
                if ($_SESSION['cargo']=="Gestor" ) {
                    # code...
                    header("Location: /");
                } else {
                    if($_SESSION['cargo']=="Balconista" ){
                        header("Location: /Venda/basconista");
                    }else{
                        header("Location: /login");  
                    }
                }
            } else {
                # code...
                header("Location: /eliminado");
            }
        } else {
            # code...
            header("Location: /login");
        }
    }
    public function selectLogin(){
        //parent::isProtected();
        try {
            $sql="SELECT nome FROM funcionario where idf=:marcador_id";
            $stmt=$this->conexao->prepare($sql);
            $stmt->execute(array('marcador_id'=>$_SESSION['usuario_logado']));
        
            $dados=$stmt->fetchObject();
        
        } catch (Exception $ex) {
            //throw $th;
            echo $ex->getMessage();
        }
    }
}
?>