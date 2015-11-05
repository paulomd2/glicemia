<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require_once 'head.php'; ?>
        <script>
            $(document).ready(function () {

            });
        </script>

        <style type="text/css">
            .tabela{
                background:#fff;
                width:200px;
                padding:0px;
                border:1px solid #f0f0f0;
                float:left;
                margin-right:20px;
            }
            .td{
                background:#f8f8f8;
                width:20px;
                height:20px;
                text-align:center;

            }
            .hj{
                background: #FFFFCC;
                width:20px;
                height:20px;
                text-align:center;
            }
            .dom{
                background: #FFCC99;
                width:20px;
                height:20px;
                text-align:center;
            }
            .evt{
                background: #CCFF99;
                width:20px;
                height:20px;
                text-align:center;
            }
            .mes{
                background:#fff;
                width:auto;
                height:20px;
                text-align:center;
            }
            .show{
                background:#202020;
                width:300px;
                height:30px;
                text-align:left;
                font-size:12px;
                font-weight:bold;
                color:#CCFF00;
                padding-left:5px;
            }
            .linha{
                background:#404040;
                width:300px;
                height:20px;
                text-align:left;
                font-size:11px;
                color:#f0f0f0;
                padding:1px 1px 1px 10px;
            }
            .sem{
                background: #ECE6D9;
                width:auto;
                height:20px;
                text-align:center;
                font-size:12px;
                font-weight:bold;
                font-family:Verdana;
            }
            body,td,th {
                font-family: Verdana;
                font-size: 11px;
                color: #000000;
            }
            a:link {
                color: #000000;
                text-decoration: none;
            }
            a:visited {
                text-decoration: none;
                color: #000000;
            }
            a:hover {
                text-decoration: underline;
                color: #FF9900;
            }
            a:active {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <nav id="menu">
            <?php
            require_once 'menu.php'
            ?>
        </nav>
        <section id="listaGlicemia">
            <?php
            require_once 'model/horarioDAO.php';
            require_once 'model/glicemiaDAO.php';

            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            $mesAtual = ucfirst(strftime('%B'));
            $mes = date('m');
            $ano = date('Y');
            $numDias = date('t');

            $horarios = $objHorarioDao->listaHorario();
            $glicemias = $objGlicemiaDao->listaGlicemia($mes);
            
            array_unshift($glicemias, array(''));
            ?>
            <table border='1'>
                <thead>
                    <tr id="mes">
                        <?php
                        echo $mesAtual;
                        ?>
                    </tr>
                </thead>
                <tr>
                    <td>Dia</td>
                    <?php
                    foreach ($horarios as $horario) {
                        echo '<td id="' . $horario["idHorario"] . '">' . utf8_encode($horario["titulo"]) . '</td>';
                    }
                    ?>
                </tr>
                <?php
                for ($i = 1; $i <= $numDias; $i++) {
                    echo '<tr>';

                    for ($j = 0; $j <= count($horarios); $j++) {
                        if ($j == 0) {
                            echo '<td>' . $i . '</td>';
                        } else {
                            $dia = ($i <= 9) ? '0' . $i : $i;
                            $data = $dia . '/' . $mes . '/' . $ano;
                            $indice = array_search($data, array_column($glicemias, 'data'));
                            
                            if ($indice) {
                                echo '<td>' . $glicemias[$indice]['glicemia'] . '</td>';
                            }else{
                                echo '<td>'.array_search($data, array_column($glicemias, 'data')).'</td>';
                            }
                            /*
                              if (date('d', strtotime(@$glicemias[$j]['data'])) == $dataCompara) {
                              echo '<td>'.$glicemias[$j]['glicemia'].'</td>';
                              } else {
                              echo '<td>&nbsp;</td>';
                              }
                             * 
                             */
                        }
                    }

                    echo '</tr>';
                }
                ?>
            </table>
        </section>
        <section id="mais">
            Adicionar 
        </section>
    </body>
</html>