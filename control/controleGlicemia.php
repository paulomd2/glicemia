<?php
require_once '../model/glicemiaDAO.php';

$opcao = $_POST['opcao'];
switch($opcao){
    case 'cadastrar':
        $idHorario = $_POST['horario'];
        echo $data = $_POST['data'];
        $glicemia = $_POST['glicemia'];
        $obs = $_POST['obs'];
        
        $objGlicemia->setIdHorario($idHorario);
        $objGlicemia->setData($data);
        $objGlicemia->setGlicemia($glicemia);
        $objGlicemia->setObs($obs);
        
        $objGlicemiaDao->cadGlicemia($objGlicemia);
        break;
}