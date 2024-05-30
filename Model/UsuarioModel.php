<?php
class UsuarioModel {
    private $idv;
    private $qtdrequerida;
    private $totalCompra;
    private $datavenda;
    private $fatura;
    private $idf ;
    private $idp;

    public function __construct($idv,$qtdrequerida,$totalCompra,$datavenda,$fatura,$idf,$idp) {
        $this->idv = $idv;
        $this->qtdrequerida = $qtdrequerida;
        $this->totalCompra = $totalCompra;
        $this->datavenda = $datavenda;
        $this->fatura = $fatura;
        $this->idf = $idf;
        $this->idp = $idp;
    }

    public function getIdv() {
        return $this->idv;
    }

    public function getqtdrequerida() {
        return $this->qtdrequerida;
    }

    public function gettotalCompra() {
        return $this->totalCompra;
    }
    public function getdatavenda() {
        return $this->datavenda;
    }
    public function getfatura() {
        return $this->fatura;
    }
    public function getidf() {
        return $this->idf;
    }
    public function getidp() {
        return $this->idp;
    }
}
?>
