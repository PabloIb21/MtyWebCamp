<?php

error_reporting(E_ALL ^ E_NOTICE);
include_once 'funciones/funciones.php';

$nombre_invitado = $_POST['nombre_invitado'];
$apellido_invitado = $_POST['apellido_invitado'];
$biografia = $_POST['biografia_invitado'];

$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){

    $directorio = "../img/invitados/";

    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }

    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    }else{
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {
        $stmt = $conn->prepare(" INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES ( ?, ?, ?, ?) ");
        $stmt->bind_param('ssss', $nombre_invitado, $apellido_invitado, $biografia, $imagen_url);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $stmt->insert_id,
                'resultado_imagen' => $imagen_resultado
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

    $directorio = "../img/invitados/";

    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }

    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    }else{
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {

        if($_FILES['archivo_imagen']['size'] > 0){

            // con imagen
            $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ?, editado = NOW() WHERE id_invitado = ?');
            $stmt->bind_param('ssssi', $nombre_invitado, $apellido_invitado, $biografia, $imagen_url, $id_registro);
        }else{
            // sin imagen
            $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, editado = NOW() WHERE id_invitado = ?');
            $stmt->bind_param('sssi', $nombre_invitado, $apellido_invitado, $biografia, $id_registro);
        }

        $estado = $stmt->execute();
        if($estado == true){
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
        $stmt = $conn->prepare('DELETE FROM invitados WHERE id_invitado = ? ');
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