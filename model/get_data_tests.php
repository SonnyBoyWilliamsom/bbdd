<?php

    $curso_error = true;
    $unit_error = true;
    $respuestas_error = true;
    $questions = array();
    $answers = array();

    for ($i = 0; $i < count($unidades); $i++) {
        if ($unidades[$i]['id_curso'] == $code['idc']) {
            $unis[0] = $unidades[$i];
            $curso_error = false;
            $counter_q = 0;
            $counter_a = 0;
            for ($a = 0; $a < count($preguntas); $a++) {

                if ($preguntas[$a]['id_unidad'] == $code['idu']) {

                    $questions[$counter_q++] = $preguntas[$a];
                    $unit_error = false;

                    for ($b = 0; $b < count($respuestas); $b++) {

                        if ($respuestas[$b]['id_pregunta'] == $questions[$counter_q - 1]['id_pregunta']) {
                            echo '<br>id_pregunta_questions' . $questions[$counter_q - 1]['id_pregunta'];
                            echo '<br>id_pregunta_respuestas' . $respuestas[$b]['id_pregunta'];

                            echo '<br>counterr' . $counter_a;
                            $answers[$counter_a++] = $respuestas[$b];
                        }
                    }
                }
            }
            break;
        }
    }
    echo 'c=' . $curso_error . '; u=' . $unit_error . '; r=' . $respuestas_error;


