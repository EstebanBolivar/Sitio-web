<?php

require_once 'DataBase.php';

if (isset($_POST['enviarproducto'])) {
    $db = new DataBase();
    $db->Conectar();

    $foto = $_FILES["fotografia"]["name"];
    $t = explode(".", $foto);
    $exten = $_POST['id_producto'] . "." . end($t);
    $ruta = $_FILES["fotografia"]["tmp_name"];
    $destino = "images/" . $foto;
    $destino2 = "images/" . $exten;
    copy($ruta, $destino);
    rename($destino, $destino2);
    
    $db->insertar(array($_POST['id_producto'], $_POST['nombre'], $_POST['precio'], $_POST['categoria'], $destino2), "producto");
    require_once 'index_1.php';
}

if (isset($_POST['enviardetalle'])) {
    $db = new DataBase();
    $db->Conectar();
    $db->insertar(array($_POST['id_detalle'], $_POST['fabricante'], $_POST['caracteristica'], $_POST['id_producto']), "detalle");
    require_once 'index_1.php';
}

if (isset($_POST['enviarstock'])) {
    $db = new DataBase();
    $db->Conectar();
    $db->insertar(array($_POST['id_stock'], $_POST['cantidad'], $_POST['disponibilidad'], $_POST['id_producto']), "stock");
    require_once 'TablaConsulta.php';
}

if (isset($_POST['enviarcliente'])) {
    $db = new DataBase();
    $db->Conectar();

    $sql = 'SELECT * FROM usuario';
    $res = mysqli_query($sql);
    $verificar_usuario = 0;

    while ($result = mysqli_fetch_object($res)) {
        if ($result->correo == $_POST['correo']) {
            $verificar_usuario = 1;
        }
    }

    if ($verificar_usuario == 0) {
        $db->insertar(array($_POST['cedula'], $_POST['nombre'], $_POST['pais'], $_POST['correo'], $_POST['ciudad'], $_POST['codigo'], $_POST['telefono'], $_POST['T_usuario']), "usuario");

        echo 'Usted se ha registrado correctamente.';
    } else {
        echo 'Este correo ya ha sido registrado anteriormente.';
    }


    header("Location: index.php");
}

if (isset($_POST['eliminarProducto'])) {
    $db = new DataBase();
    $db->Conectar();
    $db->EliminarProducto(array(), "producto", $_POST['id_producto']);
    require_once 'TablaConsulta.php';
}

if (isset($_POST['eliminarUsuario'])) {
    $db = new DataBase();
    $db->Conectar();
    $db->EliminarUsuario(array(), "usuario", $_POST['cedula']);   
    require_once 'TablaConsulta.php';
}

if (isset($_POST["carrit"])) {
    $db = new DataBase();
    $db->Conectar();
    $db->insertarc(array($_POST["carrit"]),"carrito");
    require_once 'Categorias.php';
}

if (isset($_POST['borrar'])) {
    $db = new DataBase();
    $db->Conectar();
    $db->Eliminarp (array(), "carrito", $_POST['borrar']);   
    require_once 'CarritoDeCompras.php';
}
?>   