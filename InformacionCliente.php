<?php
session_start();

if (isset($_SESSION['loggedin']))  
{ 
echo 'Hola, '; 
echo '<b>'.$_SESSION['username']. '</b>.'; 

    } 
?>
<?php
$id_producto = $_GET['id_producto'];
require_once 'DataBase.php';
$db = new DataBase();
$db->conectar();
$rec = $db->consultar("producto", "id_producto", $id_producto);
while ($row = mysqli_fetch_array($rec)) {
    $id_prod = $row[0];
    $nombre = $row[1];
    $precio = $row[2];
    $categoria = $row[3];
    $img = $row[4];
}
?>
<?php
require_once 'DataBase.php';
$db = new DataBase();
$db->conectar();
$rec = $db->consultar("categoria", "id_categoria", $categoria);
while ($row = mysqli_fetch_array($rec)) {
    $id_categoria = $row[0];
    $nombre_c = $row[1];
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PRODUCTOS</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- jQuery -->
    </head>
    <body>
        <div>
            <div class="panel-body">              
                <table width="10%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <h1 class="page-header"> Datos del Producto</h1>
                    <div class="col-md-offset-3">
                        <?php
                        $id_producto = $_GET['id_producto'];
                        require_once 'DataBase.php';
                        $db = new DataBase();
                        $db->conectar();
                        $rec = $db->consultar("producto", "id_producto", $id_producto);
                        while ($row = mysqli_fetch_array($rec)) {
                            $ruta = $row[4];
                        }
                        echo '<img height="200 px" width="200 px" src="' . $ruta . '">';
                        ?>
                    </div>

                    <div class="col-md-push-6"> 
                        <tr>
                            <th>id_producto</th>
                            <th>nombre</th>
                            <th>precio</th>
                            <th>categoria</th>
                        </tr>
                        <tr>
                            <td><?php echo $id_prod; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $precio; ?></td>
                            <td><?php echo $nombre_c; ?></td>                                                      
                        </tr>

                </table>
                <table width="10%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <h1 class="page-header"> Detalle del Producto</h1>                        

                    <div class="col-md-push-6"> 
                        <tr>
                            <th>id_Detalle</th>
                            <th>Fabricante</th>
                            <th>Caracteristicas</th>
                            <th>Id_Producto</th>
                        </tr>                 

                        <?php
                        require_once 'DataBase.php';
                        $db = new DataBase();
                        $db->conectar();
                        $rec = $db->consultar("detalle", "id_producto", $id_producto);
                        while ($row = mysqli_fetch_array($rec)) {
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "</tr>";
                        }
                        ?>
                </table>

                <table width="10%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <h1 class="page-header"> Detalle del Stock</h1>                        

                    <div class="col-md-push-6"> 
                        <tr>
                            <th>id_Stock</th>
                            <th>Cantidad</th>
                            <th>Disponibilidad</th>
                            <th>Id_Producto</th>
                        </tr>                 

                        <?php
                        require_once 'DataBase.php';
                        $db = new DataBase();
                        $db->conectar();
                        $rec = $db->consultar("Stock", "id_producto", $id_producto);
                        while ($row = mysqli_fetch_array($rec)) {
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "</tr>";
                        }
                        ?>
                </table>
                <form method="post" action="Control.php" enctype="multipart/form-data" id="activo">
                    Escojer la cedula para eliminar:
                    <select name="id_producto" id="id_producto" class="form-control">
                        <?php
                        require_once 'DataBase.php';
                        $db = new DataBase();
                        $db->conectar();
                        $res = $db->consultar("producto", "id_producto", $id_producto);
                        while ($row = mysqli_fetch_array($res)) {
                            echo '<option>';
                            echo $row[0];
                            echo '</option>';
                        }
                        ?>
                        <input type="submit" id="eliminarProducto" name="eliminarProducto" value="Eliminar Producto" class="btn btn-default">
                        </form>  
                        </div>
                        </div>
                        <br>
                        <br>
                        <div>
                            <input type="button" value="volver a la Tabla de consultas" name="volver"  id="volver" onclick="location = 'TablaConsulta.php'">
                        </div>

                        <script src="js/jquery.min_1.js"></script>

                        <!-- Bootstrap Core JavaScript -->
                        <script src="js/bootstrap.min.js"></script>

                        <!-- Metis Menu Plugin JavaScript -->
                        <script src="js/metisMenu.min.js"></script>

                        <!-- DataTables JavaScript -->
                        <script src="js/jquery.dataTables.min.js"></script>
                        <script src="js/dataTables.bootstrap.min.js"></script>
                        <script src="js/dataTables.responsive.js"></script>

                        <!-- Custom Theme JavaScript -->
                        <script src="js/sb-admin-2.js"></script>

                        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
                        <script>
                                $(document).ready(function () {
                                    $('#dataTables-example').DataTable({
                                        responsive: true
                                    });
                                });
                        </script>
                        </body> 
                        </html>