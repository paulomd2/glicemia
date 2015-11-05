<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require_once 'head.php'; ?>
        <script>
            $(document).ready(function(){
                $("#listaHorarios").sortable({
                    opacity: 0.6,
                    cursor: 'move',
                    update: function () {
                        var order = $(this).sortable("serialize") + '&opcao=ordem';

                        $.post("control/controleHorario.php", order, function (theResponse) {
                            console.log(theResponse);
                        });
                    }
                });
                
                
                $("input[type='radio']").change(function(){
                    var nome = $(this).attr('name');
                    var idHorario = nome.split('status')[1];
                    var status = $(this).val();
                    
                    $.post('control/controleHorario.php',{opcao:'status',status:status,idHorario:idHorario},
                    function(r){
                        console.log(r);
                    })
                })
            })
        </script>
    </head>
    <body>
        <nav id="menu">
            <?php
            require_once 'menu.php'
            ?>
        </nav>
        <section id="listaHorarios">
            <?php
            require_once 'model/horarioDAO.php';
            $horarios = $objHorarioDao->listaHorario();
            
            foreach($horarios as $horario){
                if($horario['status'] == 1){
                    $checked = '
                    <input type="radio" value="1" name="status'.$horario['idHorario'].'" class="verde" checked />
                    <input type="radio" value="2" name="status'.$horario['idHorario'].'" class="vermelho" />';
                }else{
                    $checked = '
                        <input type="radio" value="1" name="status'.$horario['idHorario'].'" class="verde" />
                        <input type="radio" value="2" name="status'.$horario['idHorario'].'" class="vermelho" checked />
                    ';
                }
                
                echo '<div id="horario_'.$horario['idHorario'].'">
                    <label>'.utf8_encode($horario["titulo"]).'</label>
                    '.$checked.'
                </div>';
            }
            ?>
        </section>
    </body>
</html>
