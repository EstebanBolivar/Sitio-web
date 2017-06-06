<?php

class DataBase {

    private $usuario;
    private $contraseña;
    private $servidor;
    private $nomBD;
    private $link;

    function DataBase() {
        $this->usuario = "root";
        $this->contraseña = "";
        $this->servidor = "localhost";
        $this->nomBD = "sitioweb";
        $this->link = "";
    }

    function Conectar() {
        $this->link = mysqli_connect($this->servidor, $this->usuario, $this->contraseña);
        mysqli_select_db($this->link, $this->nomBD);

        //$this->link = mysql_conect($this->servidor, $this->usuario, $this->contraseña);
        //mysql_select_db($this->nomBD,$this->link);
        echo"";
    }

    function insertar($fila = array(), $tabla = "") {
        $valoresFila = "";
        while (list($key, $val) = each($fila)) {
            $valoresFila = $valoresFila . "'" . $val . "', ";
        }
        $valoresFila = substr($valoresFila, 0, -2);
        mysqli_query($this->link, " insert into " . $tabla . " values (" . $valoresFila . "); ")or die('la consulta fallo' . mysqli_error($this->link));

        //mysql_query(" insert into ".$tabla." values (".$valoresFila.");")or die('la consulta fallo'.mysqli_error);
    }
	
	 function insertarc($fila = array(), $tabla = "") {
        $valoresFila = "";
        while (list($key, $val) = each($fila)) {
            $valoresFila = $valoresFila . "'" . $val . "', ";
        }
        $valoresFila = substr($valoresFila, 0, -2);
        mysqli_query($this->link, " insert into " . $tabla . "(id_producto) values(" . $valoresFila . "); ")or die('la consulta fallo' . mysqli_error($this->link));

        //mysql_query(" insert into ".$tabla." values (".$valoresFila.");")or die('la consulta fallo'.mysqli_error);
    }

    function consultar($tabla = "", $campo = "", $dato = "") {
        if ($campo == "") {
            $query = " select * from " . $tabla;
        } else if ($dato == "") {
            $query = "select " . $campo . " from " . $tabla;
        } else {
            $query = "select * from " . $tabla . " where " . $campo . " = " . $dato;
        }
        $res = mysqli_query($this->link, $query);
        // $res = mysql_query($query);
        return $res;
    }  
    
    function EliminarProducto($fila = array(), $tabla = "", $id_producto = ""){
        $eliminar = "delete from producto where id_producto='$id_producto'";
        mysqli_query($this->link, $eliminar)or die("no se pudo eliminar" .mysqli_error($this->link));
    }
    
    function EliminarUsuario($fila = array(), $tabla = "", $cedula = "") {
        $eliminar = "delete from usuario where cedula='$cedula'";
        mysqli_query($this->link, $eliminar)or die("no se pudo eliminar" .mysqli_error($this->link));
    }
    
    function Eliminarp($fila = array(), $tabla = "", $id_carrito = "") {
        $eliminar = "delete from carrito where id_carrito='$id_carrito'";
        mysqli_query($this->link, $eliminar)or die("no se pudo eliminar" . mysqli_error($this->link));
    }
   
}
?>
