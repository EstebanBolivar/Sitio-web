<?php
session_start();

if (isset($_SESSION['loggedin']))  
{ 
echo 'Hola, '; 
echo '<b>'.$_SESSION['username']. '</b>.'; 

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

        <title>USUARIOS</title>

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
                    <h1 class="page-header"> Datos del Usuario</h1>

                    <tr>
                        <th>Cedula</th>
                        <th>nombre</th>
                        <th>pais</th>
                        <th>correo</th>
                        <th>ciudad</th>
                        <th>codigo</th>
                        <th>telefono</th>
                        <th>tipo</th>
                    </tr>                                 

                    <?php
                    $cedula = $_GET['cedula'];
                    require_once 'DataBase.php';
                    $db = new DataBase();
                    $db->conectar();
                    $rec = $db->consultar("usuario", "cedula", $cedula);
                    while ($row = mysqli_fetch_array($rec)) {
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>$row[4]</td>";
                        echo "<td>$row[5]</td>";
                        echo "<td>$row[6]</td>";
                        echo "<td>$row[7]</td>";
                        echo "</tr>";
                    }
                    ?>

                </table>
                <form method="post" action="Control.php" enctype="multipart/form-data" id="activo">
                    Escojer la cedula para eliminar:
                    <select name="cedula" id="cedula" class="form-control">
                        <?php
                        require_once 'DataBase.php';
                        $db = new DataBase();
                        $db->conectar();
                        $res = $db->consultar("usuario", "cedula", $cedula);
                        while ($row = mysqli_fetch_array($res)) {
                            echo '<option>';
                            echo $row[0];
                            echo '</option>';
                        }
                        ?>
                        <input type="submit" id="eliminarUsuario" name="eliminarUsuario" value="Eliminar Usuario" class="btn btn-default">
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