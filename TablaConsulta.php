<?php
session_start();
if (isset($_SESSION['loggedin']))  
{ 
echo 'Hola, '; 
echo '<b>'.$_SESSION['username']. '</b>.'; 

    } 
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Tablas</title>

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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tabla de Productos</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>id_producto</th>
                                    <th>nombre</th>
                                    <th>precio</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id_producto</th>
                                    <th>nombre</th>
                                    <th>precio</th>
                                                                  
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                <?php
                                require_once 'dataBase.php';
                                $db = new dataBase();
                                $db->conectar();
                                $rec = $db->consultar("producto");
                                while ($row = mysqli_fetch_array($rec)) {
                                    ?>
                                    <tr class="odd gradeX">;
                                        <?php
                                        echo "<td><a href='InformacionCliente.php?id_producto=$row[0]'>$row[0]</a></td>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>$row[2]</td>";
                                                                              
                                        ?>
                                    <?php } ?>
                                </tr>                       
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Tabla de Usuarios</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampl">
                                        <thead>
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
                                        </thead>
                                        <tfoot>
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
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            require_once 'dataBase.php';
                                            $db = new dataBase();
                                            $db->conectar();
                                            $rec = $db->consultar("usuario");
                                            while ($row = mysqli_fetch_array($rec)) {
                                                ?>
                                                <tr class="odd gradeX">;
                                                    <?php
                                                    echo "<td><a href='InformacionCliente_1.php?cedula=$row[0]'>$row[0]</a></td>";
                                                    echo "<td>$row[1]</td>";
                                                    echo "<td>$row[2]</td>";
                                                    echo "<td>$row[3]</td>";
                                                    echo "<td>$row[4]</td>";
                                                    echo "<td>$row[5]</td>";
                                                    echo "<td>$row[6]</td>";
                                                    echo "<td>$row[7]</td>";
                                                    ?>
                                                <?php } ?>
                                            </tr>;                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>  
                                <input type="button" value="Agregar Producto" name="Agregar"  id="Agregar" onclick="location = 'index_1.php'">
                            </div>                                                          
                            <br>
                            <br>
                            <div>  
                                <input type="button" value="volver al Sitio Web" name="volver"  id="volver" onclick="location = 'index.php'">
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
                            <script src="../dist/js/sb-admin-2.js"></script>

                            <!-- Page-Level Demo Scripts - Tables - Use for reference -->
                            <script>
                                    $(document).ready(function () {
                                        $('#dataTables-example').DataTable({
                                            responsive: true
                                        });
                                    });
                            </script>
                            <script>
                                $(document).ready(function () {
                                    $('#dataTables-exampl').DataTable({
                                        responsive: true
                                    });
                                });
                            </script>
                            </body>
                            </html>