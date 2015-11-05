<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php require_once 'head.php'; ?>
        <script>
            $(document).ready(function () {
                $("#btnSalvar").click(function(){
                    var horario = $("#horario").val();
                    var data = $("#dia").val();
                    var glicemia = $("#glicemia").val();
                    var obs = $("#obs").val();
                    
                    
                    $(".erro").html('');
                    if(horario == ''){
                        $("#horario").focus();
                        $("#spanHorario").html('Você deve selecionar um Horário!');
                    }else if(dia == ''){
                        $("#dia").focus();
                        $("#spanData").html('Você deve informar uma Data!');
                    }else if(glicemia == ''){
                        $("#glicemia").focus();
                        $("#spanGlicemia").html('Você deve informar a Glicemia!');
                    }else{
                        $.post('control/controleGlicemia.php',{opcao:'cadastrar',horario:horario,data:data,glicemia:glicemia,obs:obs},
                        function(r){
                            console.log(r);
                        })
                    }
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
        <section id="cadGlicemia">
            <fieldset>
                <label>Horário:</label>
                <select name="horario" id="horario">
                    <option value="">Selecione um horário</option>
                    <?php
                    require_once './model/horarioDAO.php';
                    $horarios = $objHorarioDao->listaHorario();

                    foreach ($horarios as $horario) {
                        echo '<option value="' . $horario["idHorario"] . '">' . utf8_encode($horario["titulo"]) . '</option>';
                    }
                    ?>
                </select><br />
                <span id="spanHorario" class="erro"></span>
            </fieldset>
            <fieldset>
                <label>Data:</label>
                <input type="datetime-local" name="dia" id="dia" value="<?php echo implode('T',explode(' ',date('Y-m-d H:i:s'))); ?>" /><br />
                <span id="spanData" class="erro"></span>
            </fieldset>
            <fieldset>
                <label>Glicemia:</label>
                <input type="number" name="glicemia" id="glicemia" min="20" max="500" /><br />
                <span id="spanGlicemia" class="erro"></span>
            </fieldset>
            <fieldset>
                <label>Observação:</label>
                <textarea name="obs" id="obs" rows="10" cols="50"></textarea>
            </fieldset>
            <fieldset>
                <button id="btnSalvar">Salvar</button>
            </fieldset>
        </section>
    </body>
</html>
