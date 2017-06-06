<?php
session_start();
?>
<!DOCTYPE HTML>
<head>
    <title>Tienda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>

    <link href="CSS/bootstrap.min.css" rel="stylesheet">

    <link href="CSS/metisMenu.min.css" rel="stylesheet">

    <link href="CSS/dataTables.bootstrap.css" rel="stylesheet">

    <link href="CSS/dataTables.responsive.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script> 
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>

    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#dc_mega-menu-orange').dcMegaMenu({rowItems: '4', speed: 'fast', effect: 'fade'});
        });
    </script>

</head>
<body>
    <div class="wrap">
        <div class="header">
            <div class="header_top">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.jpg" alt="" /></a><div class="col_1_of_4 span_1_of_4"><h4>TIENDA</h4></div>
                </div>
                <div class="header_top_right">
                    <div class="search_box">
                        <form>
                            <input type="text" value="Buscar producto" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'Buscar producto';
                                    }"><input type="submit" value="Buscar">
                        </form>
                    </div>
                    <div class="shopping_cart">
                        <div class="cart">
                            <a href="CarritoDeCompras.php" title="Ver mi Carrito de compras" rel="nofollow">
                                <strong class="opencart"> </strong>
                                <span class="cart_title">Carrito</span>
                                <span class="no_product">(Vacio)</span>
                            </a>
                        </div>
                    </div>

                    <div class="login">
                        <span><a href="login.php"><img src="images/login.png" alt="" title="login"/></a></span>
                    </div>
                    <div class="login">
                        <span><a href="logout.php"><img src="images/sesion.jpg" alt="" title="sesion"/></a></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="header_top">
                <div class="header_top_center">
                    <div id="navegador">
                        <div class="menu">
                            <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                                <li><a href="index.php">Inicio</a></li>
                                <li><a href="Categorias.php">Categorias</a></li>
                                <li>    <?php
                                    if (isset($_SESSION['loggedin'])) {
                                        echo 'Hola, ';
                                        echo '<b>' . $_SESSION['username'] . '</b>.';
                                    }
                                    ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <br><br><br>

            <div class="header_top">
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                        <thead>
                            <tr>
                                <th>ID Producto</th>
                                <th>Nombre Producto</th>
                                <th>Precio</th>                               
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX">
                                <?php
                                require_once 'dataBase.php';
                                $db = new dataBase();
                                $db->conectar();
                                $rec = $db->consultar("carrito");
                                while ($row = mysqli_fetch_array($rec)) {
                                    $id_carr = $row[0];
                                    $id_pro = $row[1];


                                    $recd = $db->consultar("producto", "id_producto", $id_pro);
                                    while ($row = mysqli_fetch_array($recd)) {
                                        ?>
                                    <tr class="odd gradeX">;
                                        <?php
                                        echo "<td>$row[0]</td>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>$row[2]</td>";
                                        ?>
                                <form method="post" enctype="multipart/form-data" action="Control.php">
                                    <td><button type="submit" id="borrar" name="borrar" value="<?php echo $id_carr ?>" >X</button></td>     
                                </form>
                                <?php
                            }
                        }
                        ?>

                        </tr>                        
                        </tbody>

                    </table>
                    <button name="compra" id="compra" class="details" href="#">Realizar Compra</button>
                </div>
            </div>

        </div>
    </div>
    <br><br><br>
    <div class="footer">
        <div class="wrapper">	
            <div class="section group">

                <div class="col_1_of_4 span_1_of_4">
                    <h4>Contacto</h4>
                    <ul>
                        <li><span>+57 3204529649</span></li>
                    </ul>
                    <div class="social-icons">
                        <h4>Redes sociales</h4>
                        <ul>
                            <li class="facebook"><a href="#" target="_blank"> </a></li>
                            <li class="twitter"><a href="#" target="_blank"> </a></li>                           
                            <li class="contact"><a href="#" target="_blank"> </a></li>                         
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="copy_right">
                <p>Compant Name © All rights Reseverd</p>
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin'])) {
        ?> 
        <script lenguage="JavaScript" type="text/javascript" src="js/Ocultar_1_1.js">formAdm();</script>
        <?php
    } elseif (!isset($_SESSION['loggedin'])) {
        ?> 
        <script type="text/javascript">
            $(document).ready(function () {
                $('#compra').hide();
            }
            );
        </script>
        <?php
    }
    ?>



    <script type="text/javascript">
        $(document).ready(function () {
            /*
             var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear' 
             };
             */

            $().UItoTop({easingType: 'easeOutQuart'});

        });
    </script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>
