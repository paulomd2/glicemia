<?php
class Horario{
    private $idHorario;
    private $status;
    private $ordem;
    
    public function getIdHorario() {
        return $this->idHorario;
    }
    public function setStatus($status) {
        $this->status = seg($status);
    }
    

    public function getStatus() {
        return $this->status;
    }
    public function setIdHorario($idHorario) {
        $this->idHorario = seg($idHorario);
    }
    

    public function getOrdem() {
        return $this->ordem;
    }
    public function setOrdem($ordem) {
        $this->ordem = seg($ordem);
    }
}

$objHorario = new Horario();