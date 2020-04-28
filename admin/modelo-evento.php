<?php

error_reporting(E_ALL ^ E_NOTICE);
include_once 'funciones/funciones.php';

$titulo = $_POST['titulo_evento'];
$id_categoria = $_POST['categoria_evento'];
$id_invitado = $_POST['invitado'];
// obtener la fecha
$fecha = $_POST['fecha_evento'];
$fecha_formateada = date('Y-m-d', strtotime($fecha));
$hora = $_POST['hora_evento'];
$hora_formateada = date('H:i', strtotime($hora));

$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){
    
    try {
        $stmt = $conn->prepare(" INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES ( ?, ?, ?, ?, ? )");
        $stmt->bind_param('sssii', $titulo, $fecha_formateada, $hora_formateada, $id_categoria, $id_invitado);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $stmt->insert_id
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e){
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);
}

if($_POST['registro'] == 'actualizar'){

    try {
        $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, editado = NOW() WHERE id_evento = ? ');
        $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $hora_formateada, $id_categoria, $id_invitado, $id_registro);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    }catch(Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    echo json_encode($respuesta);
}

if($_POST['registro'] == 'eliminar'){

    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM eventos WHERE id_evento = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();

    }catch(Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }

    echo json_encode($respuesta);
}

?>