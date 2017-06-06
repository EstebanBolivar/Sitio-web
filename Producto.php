<?php
session_start();
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
$rec = $db->consultar("stock", "id_producto", $id_producto, "id_stock");
while ($row = mysqli_fetch_array($rec)) {
    $id_s = $row[0];
    $cantidad = $row[1];
    $disponibilidad = $row[2];
    $id_produ = $row[3];
}
?>
<?php
require_once 'DataBase.php';
$db = new DataBase();
$db->conectar();
$rec = $db->consultar("detalle", "id_producto", $id_producto, "id_detalle");
while ($row = mysqli_fetch_array($rec)) {
    $id_d = $row[0];
    $fabricante = $row[1];
    $caracteristica = $row[2];
    $id_produc = $row[3];
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

        </div>


        <div class="main">
            <div class="content">
                <div class="content_top">
                    <div class="back-links">
                        <h1><a href="index.php">Inicio</a> >> <a href="Categorias.php">Categorias</a></h1>
                    </div>

                    <div class="clear"></div>
                </div>
                <div class="section group">
                    <div class="cont-desc span_1_of_2">

                        <div class="grid images_3_of_2">
                            <a href="Producto.php"><img src="<?php echo $img; ?>" /></a>
                        </div>

                        <div class="desc span_3_of_2">  
                            <?php  $id_prod; ?>
                            <h2> <?php echo $nombre; ?></h2>
                            <br>
                            <h1><span class="price"> Precio: <?php echo $precio; ?></span></h1>
                            <br>
                            <h1>Cantidad: <?php echo $cantidad; ?> </h1>
                            <br>
                            <h1>Disponibilidad: <?php echo $disponibilidad; ?> </h1>
                            <br>



                            <h1>Categoria: <?php echo $nombre_c; ?> </h1>

                            <div class="add-cart">                           
                                <form method="post" enctype="multipart/form-data" action="Control.php">
                                <div class="button"><span><button type="submit" name="carrit" id="carrit" value="<?php echo $id_prod ?>" >Añadir al carrito</a></span></div>                            
                                <div class="clear"></div>
                                </form>
                            </div>
                        </div>
                        <div class="product-desc">
                            <h2>Detalle del producto</h2>
                            <br>
                            <h1>Fabricante: <?php echo $fabricante; ?> </h1>                           
                            <br>
                            <h1>Caracteristica: <?php echo $caracteristica; ?> </h1>

                        </div>                    			
                    </div>               
                </div>
            </div>
        </div>
    </div>
    <br>
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