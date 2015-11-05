<?php

require_once 'banco.php';
require_once 'bean/glicemia.php';

class GlicemiaDAO extends Banco {

    public function cadGlicemia(Glicemia $objGlicemia) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_GLICEMIA . " SET
                idHorario = " . $objGlicemia->getIdHorario() . ",
                data = '" . $objGlicemia->getData() . "',
                glicemia = " . $objGlicemia->getGlicemia() . ",
                obs = '" . $objGlicemia->getObs() . "'
               ";

        $conexao->query($sql) or die($conexao->error);
    }

    public function listaGlicemia($mes) {
        $conexao = $this->abreConexao();

        $sql = "SELECT g.*, DATE_FORMAT(g.data,'%d/%m/%Y') AS data, DATE_FORMAT(g.data,'%H:%i') AS hora
                        FROM " . TBL_GLICEMIA . " g
                        JOIN " . TBL_HORARIO . " h ON h.idHorario = g.idHorario AND h.status = 1
                            WHERE MONTH(DATA) = " . $mes . " ORDER BY DATA
               ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
    }

}

$objGlicemiaDao = new GlicemiaDAO();
