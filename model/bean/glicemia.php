<?php
class Glicemia{
    private $idGlicemia;
    private $idHorario;
    private $data;
    private $glicemia;
    private $obs;
    
    
    public function getIdGlicemia() {
        return $this->idGlicemia;
    }
    public function setIdGlicemia($idGlicemia) {
        $this->idGlicemia = seg($idGlicemia);
    }
    

    public function getIdHorario() {
        return $this->idHorario;
    }
    public function setIdHorario($idHorario) {
        $this->idHorario = seg($idHorario);
    }
    

    public function getData() {
        return $this->data;
    }
    public function setData($data) {
        $this->data = seg($data);
    }
    

    public function getGlicemia() {
        return $this->glicemia;
    }
    public function setGlicemia($glicemia) {
        $this->glicemia = seg($glicemia);
    }
    

    public function getObs() {
        return $this->obs;
    }
    public function setObs($obs) {
        $this->obs = seg($obs);
    }
}

$objGlicemia = new Glicemia();