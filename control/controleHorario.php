<?php

require_once '../model/horarioDAO.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'status':
        $idHorario = $_POST['idHorario'];
        $status = $_POST['status'];

        $objHorario->setIdHorario($idHorario);
        $objHorario->setStatus($status);

        $objHorarioDao->statusHorario($objHorario);
        break;

    case 'ordem':
        $ordem = 0;
        $horario = $_POST['horario'];

        $sql = '';
        foreach ($horario as $idHorario) {
            $sql .= '('.$ordem.', '.$idHorario.'),';
            $ordem++;
        }

        $objHorarioDao->ordenaHorario(rtrim($sql,','));
        break;
}