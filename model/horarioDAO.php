<?php
require_once 'banco.php';
require_once 'bean/horario.php';

class HorarioDAO extends Banco{
    public function ordenaHorario($sql){
        $conexao = $this->abreConexao();
        
        $sql = "INSERT INTO horario (ordem, idHorario)
                VALUES ".$sql."
                ON DUPLICATE KEY UPDATE ordem=VALUES(ordem)";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    public function statusHorario(Horario $objHorario){
        $conexao = $this->abreConexao();
        
        $sql = "UPDATE ".TBL_HORARIO."
                SET status = ".$objHorario->getStatus()."
                    WHERE idHorario = ".$objHorario->getIdHorario();
        
        $conexao->query($sql) or die($conexao->error);
        
        $this->fechaConexao();
    }
    
    
    public function listaHorario(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_HORARIO." WHERE status != 0 ORDER BY ordem";
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        
        while ($linha = $banco->fetch_array()){
            $linhas[] = $linha;
        }
        
        
        return $linhas;
        $this->fechaConexao();
    }
}

$objHorarioDao = new HorarioDAO();