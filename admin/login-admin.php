<?php

error_reporting(E_ALL ^ E_NOTICE);

include_once 'funciones/funciones.php';
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];

if(isset($_POST['login-admin'])){

    try {
        $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ? ");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado, $nivel);
        if($stmt->affected_rows){
            $existe = $stmt->fetch();
            if($existe){
                if(password_verify($password, $password_admin)){
                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['nombre'] = $nombre_admin;
                    $_SESSION['nivel'] = $nivel;
                    $_SESSION['id'] = $id_admin;
                    $respuesta = array(
                        'respuesta' => 'exitoso',
                        'usuario' => $nombre_admin
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            }else{
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        }
        $stmt->close();
        $conn->close();

    }catch (Exception $e){
        echo "Error: " . $e->getMessage();
    }

    echo json_encode($respuesta);
}

?>