<?php

$cursos = array(
    array('id_curso' => '1', 'nombre' => 'MDI', 'profesor' => 'Jairo'),
    array('id_curso' => '2', 'nombre' => 'MDA', 'profesor' => 'Pepe'),
    array('id_curso' => '3', 'nombre' => 'MDR', 'profesor' => 'Juana'),
    array('id_curso' => '4', 'nombre' => 'VFX', 'profesor' => 'Jairo'),
    array('id_curso' => '5', 'nombre' => 'MOSM', 'profesor' => 'Jairo'),
    array('id_curso' => '6', 'nombre' => 'JAVA', 'profesor' => 'Jairo'),
    array('id_curso' => '7', 'nombre' => 'DJ', 'profesor' => 'Jairo'),
    array('id_curso' => '8', 'nombre' => 'IOS', 'profesor' => 'Jairo')
);
$unidades = array(
    array('id_unidad' => '1', 'id_curso' => '1', 'nombre' => 'U1-a', 'numero' => '1'),
    array('id_unidad' => '2', 'id_curso' => '2', 'nombre' => 'U1-d', 'numero' => '1'),
    array('id_unidad' => '3', 'id_curso' => '1', 'nombre' => 'U2-r', 'numero' => '2'),
    array('id_unidad' => '4', 'id_curso' => '2', 'nombre' => 'U2-g', 'numero' => '2'),
    array('id_unidad' => '5', 'id_curso' => '2', 'nombre' => 'U3-l', 'numero' => '3'),
    array('id_unidad' => '6', 'id_curso' => '3', 'nombre' => 'U1-t', 'numero' => '1'),
);
$preguntas = array(
    array('id_pregunta' => '1', 'id_unidad' => '1', 'numero' => '1', 'pregunta' => 'Primera pregunta de la unidad 1 del curso MDI '),
    array('id_pregunta' => '2', 'id_unidad' => '1', 'numero' => '2', 'pregunta' => 'Segunda pregunta de la unidad 1 del curso MDI'),
    array('id_pregunta' => '4', 'id_unidad' => '2', 'numero' => '1', 'pregunta' => 'Primera pregunta de la unidad 1 del curso MDA'),
    array('id_pregunta' => '5', 'id_unidad' => '2', 'numero' => '2', 'pregunta' => 'Segunda pregunta de la unidad 1 del curso MDA'),
    array('id_pregunta' => '6', 'id_unidad' => '4', 'numero' => '1', 'pregunta' => 'Primera pregunta de la unidad 2 del curso MDA')
);
$respuestas = array(
    array('id_respuesta' => '1', 'id_pregunta' => '2', 'opcion' => 'a', 'descripcion' => 'Respuesta A de la Segunda pregunta de la unidad 1 del curso MDI'),
    array('id_respuesta' => '2', 'id_pregunta' => '2', 'opcion' => 'b', 'descripcion' => ' Respuesta B de la Segunda pregunta de la unidad 1 del curso MDI'),
    array('id_respuesta' => '3', 'id_pregunta' => '1', 'opcion' => 'a', 'descripcion' => 'Respuesta A de la Primera pregunta de la unidad 1 del curso MDI'),
    array('id_respuesta' => '4', 'id_pregunta' => '1', 'opcion' => 'b', 'descripcion' => 'Respuesta B de la Primera pregunta de la unidad 1 del curso MDI'),
    array('id_respuesta' => '5', 'id_pregunta' => '4', 'opcion' => 'a', 'descripcion' => 'Respuesta A de la Segunda pregunta de la unidad 1 del curso MDA'),
    array('id_respuesta' => '7', 'id_pregunta' => '4', 'opcion' => 'b', 'descripcion' => 'Respuesta B de la Segunda pregunta de la unidad 1 del curso MDA'),
    array('id_respuesta' => '10', 'id_pregunta' => '5', 'opcion' => 'b', 'descripcion' => 'Respuesta A de la Segunda pregunta de la unidad 1 del curso MDA'),
    array('id_respuesta' => '12', 'id_pregunta' => '5', 'opcion' => 'a', 'descripcion' => 'Respuesta B de la Segunda pregunta de la unidad 1 del curso MDA'),
    array('id_respuesta' => '13', 'id_pregunta' => '6', 'opcion' => 'b', 'descripcion' => 'Respuesta A de la Primera pregunta de la unidad 2 del curso MDA'),
    array('id_respuesta' => '13', 'id_pregunta' => '6', 'opcion' => 'b', 'descripcion' => 'Respuesta B de la Primera pregunta de la unidad 2 del curso MDA')
);

$respuestas_correctas = array(
    array('id_respuesta_true' => '1', 'id_pregunta' => '12', 'opcion' => 'a', 'descripcion' => 'Suponie relacionaría la misma con su curso y unidad correspondiente'),
    array('id_respuesta_true' => '2', 'id_pregunta' => '23', 'opcion' => 'b', 'descripcion' => ' Que esece a un curso, definira con su cuiente'),
    array('id_respuesta_true' => '3', 'id_pregunta' => '44', 'opcion' => 'b', 'descripcion' => 'Supde una se relacionaría la misma con su curso y unidad correspondiente')
);
$alumnos = array(
    array('id' => '1', 'id_curso' => '1', 'nombre' => 'Jaimito Borromeo'),
    array('id' => '2', 'id_curso' => '6', 'nombre' => 'Eusebio Matalascañas'),
    array('id' => '3', 'id_curso' => '8', 'nombre' => 'Gonzalo  Rubalcaba'),
    array('id' => '4', 'id_curso' => '3', 'nombre' => 'Maite Hontele')
);
