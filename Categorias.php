<?php
session_start();
?>
<!DOCTYPE HTML>
<head>
    <title>Tienda</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
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

            <div class="main">
                <div class="content">
                    <?php
                    require_once 'DataBase.php';
                    $db = new DataBase();
                    $db->conectar();
                    $rec = $db->consultar("categoria");
                    while ($row = mysqli_fetch_array($rec)) {
                        $id_categoria = $row[0];
                        $nombre = $row[1];
                        ?>
                        <div class="content_top">
                            <div class="heading">
                                <a href="Categoria.php?id_categoria=<?php echo $id_categoria; ?>"><h3><?php echo $nombre; ?></h3></a>                      
                            </div>  
                            <div class="clear"></div>
                        </div>
                    <?php } ?>

                </div>               
            </div>
        </div>
    </div>


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