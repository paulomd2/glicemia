<?php
require_once 'constantesBanco.php';

//função para remover expressões comuns de banco de dados
function seg($var) {
    $procura = array("insert into", "update", "delete from", "select % from");
    $retorno = str_ireplace($procura, '', $var);
//    $retorno = htmlentities($retorno);
    
    return $retorno;
}

//Constantes de Tabela
//Tabelas ADMIN
define("TBL_HORARIO",DB_ADMIN.TBL_ADMIN."horario ");
