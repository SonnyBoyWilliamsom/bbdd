<?php

include '../model/data.php';
if (isset($_GET['c']) && !empty($_GET['c'])) {
    $curso_error = true;
    $unit_error = true;
    $respuestas_error = true;
    $elements = explode('#', $_GET['c']);
    $questions = array();
    $answers = array();
    
 
    for ($i = 0; $i < count($unidades); $i++) {
        if ($unidades[$i]['id_curso'] == $_GET['idc']) {
            $unis[0] =$unidades[$i];
            $curso_error = false;
            $counter_q = 0;
            $counter_a = 0;
            for ($a = 0; $a < count($preguntas); $a++) {
                
                if ($preguntas[$a]['id_unidad'] == $_GET['idu']) {
                        
                    $questions[$counter_q++] = $preguntas[$a];
                    $unit_error = false;
                    
                    for($b = 0; $b < count($respuestas); $b++){
                        
                        if($respuestas[$b]['id_pregunta'] == $questions[$counter_q-1]['id_pregunta']){
                             echo '<br>id_pregunta_questions'.$questions[$counter_q-1]['id_pregunta'];
                        echo '<br>id_pregunta_respuestas'.$respuestas[$b]['id_pregunta'];
                            
                            echo '<br>counterr'.$counter_a;
                            $answers[$counter_a++] = $respuestas[$b];
                        }
                    }
                }
              
            }
            break;
        }
    }
    echo 'c='.$curso_error.'; u='.$unit_error.'; r='.$respuestas_error;
    

    include '../views/cuestionarie.php';
   
}
/*Antes de poder imprimir el test por pantalla se deben obtener tan solo las preguntas y respuestas correspondientes al código que muestra el curso y la unidad en la que se va a trabajar. Una vez obtenidos solo los datos con los que se va a trabajar se llamara a la vista del cuestionario.
Trabajando con BBDD se tiene que establecer primero la conexión. Es entonces cuando se establece una petición (query) para obtener los datos:
 * -Primero obtenemos las unidades que corresponden al curso en el que el alumno está matriculado. (Hay que incluir la posibilidad de que un mismo alumno esté cursando más de uno):
 * 
 * SELECT * FROM unidades  
 *  inner join cursos
 *  on unidades.id_curso = cursos.id_curso
 * 
 * Esta query nos devolverá solo las unidades correspondientes a un curso determinado.
 * 
 * -Una vez sabemos que unidades corresponden al curso que está haciendo el alumno podemos obtener las preguntas de cualquiera de las unidades:
 * 
 * SELECT * FROM preguntas  
 *  inner join unidades
 *  on preguntas.id_unidad = unidades.id_unidad
 * 
 * En este punto ya tenemos los datos que necesitamos: las preguntas de una determinada unidad que pertenece a un determinado curso.
 * 
 * -Para obtener las respuestas hacemos también una consulta a la BBDD:
 * 
 * SELECT * FROM respuestas  
 *  inner join preguntas
 *  on respuestas.id_pregunta = preguntas.id_pregunta
 * 
 *  Esto se lo pasamos a la vista del cuestionario para que imprima las preguntas y sus respuestas correspondientes
 *  */
    
